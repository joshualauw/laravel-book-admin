<?php

namespace App\Http\Controllers;

use App\Models\Retur;
use App\Models\Pegawai;
use App\Models\Pengambilan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ReturController extends Controller
{
    public function index()
    {
        return view("retur.index", [
            "user" => Session::get("auth.user")
        ]);
    }

    public function notice(Request $request)
    {
        $retur = Retur::find($request->id);
        if ($request->action == "terima") {
            $retur->noticed_status = "diterima";
            $message = "menerima";
        } else {
            $retur->noticed_status = "ditolak";
            $message = "menolak";
        }
        $retur->save();
        $status = $retur->checkStatus();
        if ($status == "diterima") {
            $this->returStokBarang($retur);
        }
        $retur->noticed_at = Carbon::now();
        $retur->save();

        return redirect()->back()->with("message", "sukses " . $message . " retur");
    }

    public function accept(Request $request)
    {
        $retur = Retur::find($request->id);
        if ($request->action == "terima") {
            $retur->accepted_status = "diterima";
            $message = "menerima";
        } else {
            $retur->accepted_status = "ditolak";
            $message = "menolak";
        }
        $retur->save();
        $status = $retur->checkStatus();
        if ($status == "diterima") {
            $this->returStokBarang($retur);
        }
        $retur->accepted_at = Carbon::now();
        $retur->save();

        return redirect()->back()->with("message", "sukses " . $message . " retur");
    }

    public function returStokBarang($retur)
    {
        $listBarang = $retur->pengambilan->dpengambilan;
        foreach ($listBarang as $b) {
            $d = $b->barang;
            $d->stok += $b->jumlah;
            $d->save();
        }
    }

    public function showAll(Request $request)
    {
        $user = Pegawai::where("nik", "=", Session::get("auth.user")->nik)->first();
        $pengambilan = $user->pengambilan;
        $list = [];
        foreach ($pengambilan as $p) {
            if ($p->retur != null) {
                array_push($list, $p->retur);
            }
        }

        if ($request->all == "true") {
            if ($user->jabatan_id == 1 && $user->departemen_id == 1) {
                $list = [];
                $temp_list = Retur::where("noticed_status", "=", "diterima")->get();
                foreach ($temp_list as $t) {
                    array_push($list, $t);
                }

                $temp_list = [];
                $pengambilan = Pengambilan::all();
                foreach ($pengambilan as $p) {
                    if ($p->nik_kd == $user->nik) {
                        if ($p->retur != null) {
                            array_push($temp_list, $p->retur);
                        }
                    }
                }
                //return response()->json($temp_list);

                foreach ($temp_list as $key => $t) {
                    if ($list[$key]->pengambilan->nik != $t->pengambilan->nik) {
                        array_push($list, $t);
                    }
                }
            } else {
                $list = [];
                $pengambilan = Pengambilan::all();
                foreach ($pengambilan as $p) {
                    if ($p->nik_kd == $user->nik) {
                        if ($p->retur != null) {
                            array_push($list, $p->retur);
                        }
                    }
                }
            }
        }
        return view("retur.table", ["list" => $list, "user" => $user])->render();
    }

    public function detail(Request $request)
    {
        return view("retur.detail", [
            "item" => Retur::find($request->id),
            "list" => Retur::find($request->id)->pengambilan->dpengambilan,
            "kepalaGudang" => Pegawai::where([["jabatan_id", "=", "1"], ["departemen_id", "=", "1"]])->first(),
            "user" => Pegawai::where("nik", "=", Session::get("auth.user")->nik)->first()
        ]);
    }
}
