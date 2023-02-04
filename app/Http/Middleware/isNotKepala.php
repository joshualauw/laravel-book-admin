<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class isNotKepala
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
        if ($request->session()->get("auth.role") == "pegawai") {
            return $next($request);
        }
        return redirect("/dashboard");
    }
}
