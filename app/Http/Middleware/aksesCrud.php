<?php

namespace App\Http\Middleware;

use App\Models\Pegawai;
use Closure;
use Illuminate\Http\Request;

class aksesCrud
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $master, $type)
    {
        $user = Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first();
        if ($user->access[$master]->$type || $user->jabatan->access[$master]->$type) {
            return $next($request);
        }

        if ($request->session()->get("auth.role") == "admin") {
            return redirect("/dashboard");
        } else {
            return redirect("/home");
        }
    }
}
