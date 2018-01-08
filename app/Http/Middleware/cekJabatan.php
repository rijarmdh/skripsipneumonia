<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class cekJabatan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->jabatan == "Pakar"){

        return $next($request);    
        }

        return redirect(url('dashboardlte'));
        

    }
}
