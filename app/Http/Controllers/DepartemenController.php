<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Departemen;
use App\Models\Pegawai;
use App\Models\Pengambilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class DepartemenController extends Controller
{
    public function index(Request $request)
    {
        return view('departemen.index', [
            "list" => Departemen::all(),
            "user" => Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first()
        ]);
    }

    public function tiga()
    {
        $departemen = Pengambilan::join("pegawai", "pengambilan.nik", "=", "pegawai.nik")->join("departemen", "pegawai.departemen_id", "=", "departemen.id")->select(DB::raw("count(*) as total"), "departemen.nama")->groupBy("departemen.nama")->orderBy("total", "DESC")->take(3)->get();
        return $departemen;
    }

    public function insert(Request $request)
    {
        Departemen::create([
            "nama" => $request->nama
        ]);

        return redirect("departemen")->with("message", "sukses tambah departemen");
    }
    public function update(Request $request)
    {
        $departemen = Departemen::find($request->id);
        $departemen->nama = $request->nama;
        $departemen->save();

        return redirect("departemen")->with("message", "sukses ubah departemen");
    }
    public function delete(Request $request)
    {
        $departemen = Departemen::find($request->id);
        if (count($departemen->pegawai) > 0) {
            return redirect("departemen")->with("message", "ada referensi pegawai dengan departemen ini");
        }
        $departemen->delete();

        return redirect("departemen")->with("message", "sukses hapus departemen");
    }

    public function add()
    {
        return view('departemen.addit', [
            'title' => "Departemen",
            'action' => 'Tambah',
            "edit" => null
        ]);
    }
    public function edit(Request $request)
    {
        return view('departemen.addit', [
            'title' => "Departemen",
            'action' => 'Ubah',
            "edit" => Departemen::find($request->id)
        ]);
    }

    public function filterByJabatan(Request $request)
    {
        $departemen = Departemen::find($request->departemen_id);
        $list = [];

        if ($request->jabatan_id == "all") {
            foreach ($departemen->pegawai as $peg) {
                if (str_contains(strtolower($peg->nama), strtolower($request->keyword))) {
                    array_push($list, $peg);
                }
            }
        } else {
            foreach ($departemen->pegawai as $peg) {
                if ($peg->jabatan->id == $request->jabatan_id && str_contains(strtolower($peg->nama), strtolower($request->keyword))) {
                    array_push($list, $peg);
                }
            }
        }
        return view("departemen.table", ["list" => $list])->render();
    }

    public function detail(Request $request)
    {
        $departemen = Departemen::find($request->id);
        return view("departemen.detail", [
            "item" => $departemen,
            "list" => $departemen->pegawai,
            "options" => Jabatan::all()
        ]);
    }
}
