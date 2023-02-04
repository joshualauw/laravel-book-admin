<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Retur;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\Pengambilan;
use App\Models\DPengambilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengambilanController extends Controller
{
    public function index()
    {
        return view("pengambilan.index", [
            "user" => Pegawai::where("nik", "=", Session::get("auth.user")->nik)->first()
        ]);
    }

    public function insert(Request $request)
    {
        $totalJumlah = $request->jumlah_pengambilan;
        $list = $request->kode_pengambilan;

        if ($list == null) {
            return redirect()->back()->with("message", "tidak ada item yang dipilih");
        }
        foreach ($totalJumlah as $jum) {
            if ($jum == null) {
                return redirect()->back()->with("message", "ada jumlah yang belum diisi");
            }
        }
        $pegawai = Pegawai::where("nik", "=", $request->nik)->first();
        $kd = Pegawai::where([["jabatan_id", "=", "1"], ["departemen_id", "=", $pegawai->departemen_id]])->first();
        Pengambilan::create([
            "nik" => $request->nik,
            "nik_kd" => $kd->nik,
            "status" => "menunggu",
            "noticed_status" => "menunggu",
            "accepted_status" => "menunggu",
            "noticed_at" => null,
            "accepted_at" => null
        ]);

        $pengambilan = Pengambilan::latest()->first();
        for ($i = 0; $i < count($list); $i++) {
            DPengambilan::create([
                "jumlah" => $totalJumlah[$i],
                "kode" => $list[$i],
                "pengambilan_id" => $pengambilan->id
            ]);
        }
        // $status = $pengambilan->checkStatus();
        // if ($status == "diterima") {
        //     $this->updateStokBarang($pengambilan);
        // }

        return redirect("pengambilan")->with("message", "sukses mengajukan pengambilan");
    }

    public function delete(Request $request)
    {
        $pengambilan = Pengambilan::find($request->id);

        if ($request->action == "cancel") {
            $pengambilan->status = "dibatalkan";
            $pengambilan->cancelled_at = Carbon::now();
            $pengambilan->save();
            return redirect("pengambilan")->with("message", "sukses membatalkan pengajuan");
        } else {
            Retur::create([
                "pengambilan_id" => $pengambilan->id,
                "status" => "menunggu",
                "noticed_status" => "menunggu",
                "accepted_status" => "menunggu",
                "noticed_at" => null,
                "accepted_at" => null
            ]);

            return redirect("pengambilan")->with("message", "sukses mereturkan pengambilan");
        }
    }

    public function showAll(Request $request)
    {
        $user = Pegawai::where("nik", "=", Session::get("auth.user")->nik)->first();
        $list = $user->pengambilan;

        if ($request->all == "true") {
            if ($user->jabatan_id == 1 && $user->departemen_id == 1) {
                $list = [];
                $temp_list = Pengambilan::where("noticed_status", "=", "diterima")->get();
                foreach ($temp_list as $t) {
                    array_push($list, $t);
                }
                $temp_list = Pengambilan::where("nik_kd", "=", $user->nik)->get();
                foreach ($temp_list as $key => $t) {
                    if ($list[$key]->nik != $t->nik) {
                        array_push($list, $t);
                    }
                }
            } else {
                $list = Pengambilan::where("nik_kd", "=", $user->nik)->get();
            }
        }
        return view("pengambilan.table", ["list" => $list, "user" => $user])->render();
    }

    public function notice(Request $request)
    {
        $pengambilan = Pengambilan::find($request->id);
        if ($request->action == "terima") {
            $pengambilan->noticed_status = "diterima";
            $message = "menerima";
        } else {
            $pengambilan->noticed_status = "ditolak";
            $message = "menolak";
        }
        $pengambilan->save();
        $status = $pengambilan->checkStatus();
        if ($status == "diterima") {
            $this->updateStokBarang($pengambilan);
        }
        $pengambilan->noticed_at = Carbon::now();
        $pengambilan->save();

        return redirect()->back()->with("message", "sukses " . $message . " pengajuan");
    }

    public function accept(Request $request)
    {
        $pengambilan = Pengambilan::find($request->id);
        if ($request->action == "terima") {
            $pengambilan->accepted_status = "diterima";
            $message = "menerima";
        } else {
            $pengambilan->accepted_status = "ditolak";
            $message = "menolak";
        }
        $pengambilan->save();
        $status = $pengambilan->checkStatus();
        if ($status == "diterima") {
            $this->updateStokBarang($pengambilan);
        }
        $pengambilan->accepted_at = Carbon::now();
        $pengambilan->save();

        return redirect()->back()->with("message", "sukses " . $message . " pengajuan");
    }

    public function updateStokBarang($pengambilan)
    {
        $listBarang = $pengambilan->dpengambilan;
        foreach ($listBarang as $b) {
            $d = $b->barang;
            $d->stok -= $b->jumlah;
            $d->save();
        }
    }

    public function add()
    {
        return view("pengambilan.addit", [
            "dateNow" => Carbon::now()->toDateString(),
            "timeNow" => Carbon::now()->toTimeString(),
            "user" => Pegawai::where("nik", "=", Session::get("auth.user")->nik)->first(),
            "list" => Barang::where("stok", ">", "0")->get()
        ]);
    }

    public function detail(Request $request)
    {
        return view("pengambilan.detail", [
            "item" => Pengambilan::find($request->id),
            "list" => Pengambilan::find($request->id)->dpengambilan,
            "kepalaGudang" => Pegawai::where([["jabatan_id", "=", "1"], ["departemen_id", "=", "1"]])->first(),
            "user" => Pegawai::where("nik", "=", Session::get("auth.user")->nik)->first()
        ]);
    }
}
