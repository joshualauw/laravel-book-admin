<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Rules\uniqueRule;
use App\Models\Departemen;
use App\Rules\nikFormatRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FormValidation;
use App\Models\Retur;

class PegawaiController extends Controller
{
    function index(Request $request)
    {
        return view('pegawai.index', [
            "list" => Pegawai::where("nik", "!=", "PAD001")->get(),
            "user" => Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first()
        ]);
    }

    function insert(Request $request)
    {
        FormValidation::pegawaiValidate($request, $this);
        Pegawai::create([
            "nik" => FormValidation::autogen($request->nama, Pegawai::class, "P", "nik"),
            "username" => $request->username,
            "password" => $request->password,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_telp" => $request->no_telp,
            "jabatan_id" => $request->jabatan_id,
            "departemen_id" => $request->departemen_id,
            "tgl_lahir" => $request->tgl_lahir
        ]);

        $acc_list = ["barang", "kategori", "pegawai", "gudang", "departemen", "jabatan"];
        foreach ($acc_list as $acc) {
            Access::create([
                "nik" => Pegawai::latest()->first()->nik,
                "jabatan_id" => Pegawai::latest()->first()->jabatan_id,
                "master" => $acc,
                "create" => false,
                "read" => false,
                "update" => false,
                "delete" => false,
            ]);
        }

        return redirect("pegawai")->with("message", "sukses tambah pegawai");
    }

    function update(Request $request)
    {
        FormValidation::pegawaiValidate($request, $this);
        $pegawai = Pegawai::where("nik", "=", $request->id)->first();
        $pegawai->username = $request->username;
        $pegawai->password = $request->password;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->jabatan_id = $request->jabatan_id;
        $pegawai->departemen_id = $request->departemen_id;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->save();

        return redirect("pegawai")->with("message", "sukses ubah pegawai");
    }

    function delete(Request $request)
    {
        $pegawai = Pegawai::where("nik", "=", $request->id)->first();
        $pegawai->delete();

        return redirect("pegawai")->with("message", "sukses hapus pegawai");
    }

    function add()
    {
        return view('pegawai.addit', [
            'title' => "Pegawai",
            'action' => 'Tambah',
            'listd' => Departemen::all(),
            'list' => Jabatan::all(),
            "edit" => null
        ]);
    }

    function edit(Request $request)
    {
        $pegawai = Pegawai::where("nik", "=", $request->id)->first();
        return view('pegawai.addit', [
            'title' => "Pegawai",
            'action' => 'Ubah',
            'listd' => Departemen::all(),
            'list' => Jabatan::all(),
            "edit" => $pegawai
        ]);
    }

    function fetch(Request $request)
    {
        $user = Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first();
        return $user;
    }
}
