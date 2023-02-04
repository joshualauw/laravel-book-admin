<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    function index()
    {
        return view('auth.login');
    }

    function logout(Request $request)
    {
        $request->session()->forget("auth");
        return redirect("/login");
    }

    function login(Request $request)
    {
        $pegawai = Pegawai::where([
            ["username", "=", $request->username],
            ["password", "=", $request->password]
        ])->first();

        if ($pegawai == null) {
            return redirect()->back()->with("message", "username/password salah");
        }

        if ($pegawai->username == "admin" && $pegawai->password == "nimda") {
            $request->session()->put("auth", ["user" => $pegawai, "role" => "super"]);
            return redirect("/dashboard");
        }

        $admin = Pegawai::where("departemen_id", "=", $pegawai->departemen->id)->join("jabatan", "jabatan_id", "=", "jabatan.id")->min("prioritas");

        if ($pegawai->jabatan->prioritas == $admin) {
            $request->session()->put("auth", ["user" => $pegawai, "role" => "admin"]);
            return redirect("/dashboard");
        } else {
            $request->session()->put("auth", ["user" => $pegawai, "role" => "pegawai"]);
            return redirect("/home");
        }
    }
}
