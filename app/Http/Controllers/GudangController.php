<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GudangController extends Controller
{
    public function index(Request $request)
    {
        return view('gudang.index', [
            "list" => Gudang::all(),
            "user" => Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first()
        ]);
    }

    function insert(Request $request)
    {
        Gudang::create([
            "nama" => $request->nama,
            "lokasi" => $request->lokasi,
            "kapasitas" => $request->kapasitas,
            "luas" => $request->luas
        ]);

        return redirect("gudang")->with("message", "sukses tambah gudang");
    }

    function update(Request $request)
    {
        $gudang = Gudang::find($request->id);
        $gudang->nama = $request->nama;
        $gudang->lokasi = $request->lokasi;
        $gudang->kapasitas = $request->kapasitas;
        $gudang->luas = $request->luas;
        $gudang->save();

        return redirect("gudang")->with("message", "sukses ubah gudang");
    }

    function delete(Request $request)
    {
        $gudang = Gudang::find($request->id);
        $gudang->delete();

        return redirect("gudang")->with("message", "sukses hapus gudang");
    }

    function add()
    {
        return view('gudang.addit', [
            'title' => "Gudang",
            'action' => 'Tambah',
            "edit" => null
        ]);
    }


    function edit(Request $request)
    {
        return view('gudang.addit', [
            'title' => "Gudang",
            'action' => 'Ubah',
            "edit" => Gudang::find($request->id)
        ]);
    }
}
