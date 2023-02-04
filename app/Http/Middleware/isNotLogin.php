<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isNotLogin
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
        if ($request->session()->has("auth")) {
            if ($request->session()->get("auth.role") == "admin") {
                return redirect("dashboard");
            } else {
                return redirect("home");
            }
        }
        return $next($request);
    }
}
