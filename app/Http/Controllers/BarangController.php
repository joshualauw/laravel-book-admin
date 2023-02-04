<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pegawai;
use App\Models\Pengambilan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{

    function index(Request $request)
    {
        return view('barang.index', [
            "list" => Barang::all(),
            "user" => Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first()
        ]);
    }

    function monthly()
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        $week1 = Pengambilan::where([
            ["created_at", ">=",  $year . "-" . $month . "-" . 1],
            ["created_at", "<",  $year . "-" . $month . "-" . 8]
        ])->select(DB::raw("count(*) as total"))->first();

        $week2 = Pengambilan::where([
            ["created_at", ">=",  $year . "-" . $month . "-" . 8],
            ["created_at", "<",  $year . "-" . $month . "-" . 15]
        ])->select(DB::raw("count(*) as total"))->first();

        $week3 = Pengambilan::where([
            ["created_at", ">=",  $year . "-" . $month . "-" . 15],
            ["created_at", "<",  $year . "-" . $month . "-" . 22]
        ])->select(DB::raw("count(*) as total"))->first();

        $week4 = Pengambilan::where([
            ["created_at", ">=",  $year . "-" . $month . "-" . 22],
            ["created_at", "<=",  $year . "-" . $month . "-" . 31]
        ])->select(DB::raw("count(*) as total"))->first();

        $monthly = [$week1, $week2, $week3, $week4];
        return $monthly;
    }

    function insert(Request $request)
    {
        FormValidation::barangValidate($request, $this);
        Barang::create([
            "kode" => FormValidation::autogen($request->nama, Barang::class, "B", "kode"),
            "nama" => $request->nama,
            "stok" => $request->stok,
            "jenis_satuan" => $request->jenis_satuan,
            "kategori_id" => $request->kategori,
            "harga" => $request->harga
        ]);

        $redirect = "barang";
        if ($request->session()->get('auth.role') == "pegawai") {
            $redirect = "home";
        }

        return redirect($redirect)->with("message", "sukses tambah barang");
    }

    function update(Request $request)
    {
        FormValidation::barangValidate($request, $this);
        $barang = Barang::where("kode", "=", $request->id)->first();
        $barang->nama = $request->nama;
        $barang->stok = $request->stok;
        $barang->jenis_satuan = $request->jenis_satuan;
        $barang->kategori_id = $request->kategori;
        $barang->harga = $request->harga;
        $barang->save();

        $redirect = "barang";
        if ($request->session()->get('auth.role') == "pegawai") {
            $redirect = "home";
        }

        return redirect($redirect)->with("message", "sukses ubah barang");
    }

    function delete(Request $request)
    {
        $barang = Barang::where("kode", "=", $request->id)->first();
        $barang->delete();

        $redirect = "barang";
        if ($request->session()->get('auth.role') == "pegawai") {
            $redirect = "home";
        }

        return redirect($redirect)->with("message", "sukses hapus barang");
    }

    function add(Request $request)
    {
        return view('barang.addit', [
            'title' => "Barang",
            'action' => 'Tambah',
            'list' => Kategori::all(),
            "edit" => null,
            "role" => $request->session()->get("auth.role")
        ]);
    }


    function edit(Request $request)
    {
        return view('barang.addit', [
            'title' => "Barang",
            'action' => 'Ubah',
            'list' => Kategori::all(),
            "edit" => Barang::where("kode", "=", $request->id)->first(),
            "role" => $request->session()->get("auth.role")
        ]);
    }
}
