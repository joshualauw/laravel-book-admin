<?php

namespace App\Http\Middleware;

use App\Models\Pegawai;
use App\Models\Pengambilan;
use App\Models\Retur;
use Closure;
use Illuminate\Http\Request;

class isKepala
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get("auth.role") != "pegawai") {
            return $next($request);
        }
        return redirect("/home");
    }
}
