<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Jabatan;
use App\Models\JAccess;
use App\Models\Pegawai;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        return view('jabatan.index', [
            "list" => Jabatan::all(),
            "user" => Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first()
        ]);
    }

    public function insert(Request $request)
    {
        Jabatan::create([
            "nama" => $request->nama,
            "prioritas" => $request->prioritas
        ]);
        $acc_list = ["barang", "kategori", "pegawai", "gudang", "departemen", "jabatan"];

        foreach ($acc_list as $acc) {
            JAccess::create([
                "jabatan_id" => Jabatan::latest()->first()->id,
                "master" => $acc,
                "create" => false,
                "read" => false,
                "update" => false,
                "delete" => false,
            ]);
        }

        return redirect("jabatan")->with("message", "sukses tambah jabatan");
    }
    public function update(Request $request)
    {
        $jabatan = Jabatan::find($request->id);
        $jabatan->nama = $request->nama;
        $jabatan->prioritas = $request->prioritas;
        $jabatan->save();

        return redirect("jabatan")->with("message", "sukses ubah jabatan");
    }
    public function delete(Request $request)
    {
        $jabatan = Jabatan::find($request->id);
        if (count($jabatan->pegawai) > 0) {
            return redirect("jabatan")->with("message", "ada referensi pegawai dengan jabatan ini");
        }
        $jabatan->delete();

        return redirect("jabatan")->with("message", "sukses hapus jabatan");
    }

    public function add()
    {
        return view('jabatan.addit', [
            'title' => "Jabatan",
            'action' => 'Tambah',
            "edit" => null
        ]);
    }
    public function edit(Request $request)
    {
        return view('jabatan.addit', [
            'title' => "Jabatan",
            'action' => 'Ubah',
            "edit" => Jabatan::find($request->id)
        ]);
    }

    public function filterByDepartemen(Request $request)
    {
        $jabatan = Jabatan::find($request->jabatan_id);
        $list = [];
        if ($request->departemen_id == "all") {
            foreach ($jabatan->pegawai as $peg) {
                if ($peg->departemen != null) {
                    if (str_contains(strtolower($peg->nama), strtolower($request->keyword))) {
                        array_push($list, $peg);
                    }
                }
            }
        } else {
            foreach ($jabatan->pegawai as $peg) {
                if ($peg->departemen != null) {
                    if ($peg->departemen->id == $request->departemen_id && str_contains(strtolower($peg->nama), strtolower($request->keyword))) {
                        array_push($list, $peg);
                    }
                }
            }
        }
        return view("jabatan.table", ["list" => $list])->render();
    }

    public function detail(Request $request)
    {
        $jabatan = Jabatan::find($request->id);
        return view("jabatan.detail", [
            "item" => $jabatan,
            "list" => $jabatan->pegawai,
            "options" => Departemen::all()
        ]);
    }
}
