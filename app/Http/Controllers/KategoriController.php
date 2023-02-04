<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    function index(Request $request)
    {
        return view('kategori.index', [
            "list" => Kategori::all(),
            "user" => Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first()
        ]);
    }

    function tiga()
    {
        $barang = Barang::join("kategori", "kategori_id", "=", "kategori.id")->join("dpengambilan", "barang.kode", "=", "dpengambilan.kode")->groupBy("kategori_id")->select(DB::raw("count(*) as total"), "kategori.nama")->orderBy("total", "DESC")->take(3)->get();
        return $barang;
    }

    function insert(Request $request)
    {
        FormValidation::kategoriValidate($request, $this);
        Kategori::create([
            "nama" => $request->nama
        ]);

        return redirect("kategori")->with("message", "sukses tambah kategori");
    }

    function update(Request $request)
    {
        FormValidation::kategoriValidate($request, $this);
        $kategori = Kategori::find($request->id);
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect("kategori")->with("message", "sukses ubah kategori");
    }

    function delete(Request $request)
    {
        $kategori = Kategori::find($request->id);
        if (count($kategori->barang) > 0) {
            return redirect("kategori")->with("message", "ada referensi barang dengan kategori ini");
        }
        $kategori->delete();

        return redirect("kategori")->with("message", "sukses hapus kategori");
    }

    function add()
    {
        return view('kategori.addit', [
            'title' => "Kategori",
            'action' => 'Tambah',
            "edit" => null
        ]);
    }

    function edit(Request $request)
    {
        return view('kategori.addit', [
            'title' => "Kategori",
            'action' => 'Ubah',
            "edit" => Kategori::find($request->id)
        ]);
    }
}
