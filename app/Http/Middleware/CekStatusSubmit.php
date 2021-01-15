<?php

namespace App\Http\Middleware;

use Closure;
use App\BukaPendaftaran;
use Tanggal;
use App\Camaru;
class CekStatusSubmit
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
        $camaru=Camaru::where('no_test',auth()->user()->username)->first();
        
        $response=$next($request);
        
                    

        return $response;
        
    }
}
