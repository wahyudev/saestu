<?php

namespace App\Http\Middleware;

use Closure;

class GantiPassword
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
        
        
        if (auth()->user()->ganti_password==1) {
            return redirect('pendaftar/pendaftaran/ganti-password');
        }

        return $next($request);
        
    }
}
