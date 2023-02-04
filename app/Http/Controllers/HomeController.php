<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    function index()
    {
        return view('home.index', [
            "list" => Barang::all(),
            "user" => Pegawai::where("nik", "=", Session::get("auth.user")->nik)->first()
        ]);
    }
}
