<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Retur;
use App\Models\Pegawai;
use App\Models\Pengambilan;
use Illuminate\Http\Request;

class aksesTransaksi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        $user = Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first();

        if ($user->jabatan_id == 1 && $user->departemen_id == 1) { //kepala gudang
            return $next($request);
        }

        //kepala biasa
        if ($type == "pengambilan") {
            $pengambilan = Pengambilan::find($request->id);
            if ($pengambilan->nik_kd == $user->nik || $pengambilan->nik == $user->nik) {
                return $next($request);
            }
        } else if ($type == "retur") {
            $retur = Retur::find($request->id);
            if ($retur->pengambilan->nik_kd == $user->nik || $retur->nik == $user->nik) {
                return $next($request);
            }
        }

        return redirect("/dashboard");
    }
}
