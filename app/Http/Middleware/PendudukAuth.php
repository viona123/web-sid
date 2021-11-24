<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PendudukAuth
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
        if (!$request->cookie('nik')) {
            return redirect('/login/penduduk');
        }

        return $next($request);
    }
}
