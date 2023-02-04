<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isSuper
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
        if ($request->session()->get("auth.role") != "super") {
            if ($request->session()->get("auth.role") == "admin") {
                return redirect("dashboard");
            } else {
                return redirect("home");
            }
        }
        return $next($request);
    }
}
