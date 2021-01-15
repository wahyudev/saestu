<?php

namespace App\Http\Middleware;

use Closure;
use App\Camaru;
use App\SetupPendaftaran;
use Session;
class CekOpenRegistrasi
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

        $cek_jadwal_regis=SetupPendaftaran::where('id_jenis_pendaftaran',$camaru->id_jenis_pendaftaran)->where('angkatan',$camaru->angkatan)->first();
            
           if (!$cek_jadwal_regis) {
               
                return redirect('/pendaftar/belum-buka/');
           }
           elseif ($cek_jadwal_regis->tutup_registrasi_camaru < date('Y-m-d')) {
               if ($camaru->status_submit_data=='sudah_submit') {
                 return redirect('pendaftar/pendaftaran/status-pendaftaran/'.encrypt($camaru->id_camaru));
               }else{
                    Session::put('setup',$cek_jadwal_regis);
                    return redirect('/pendaftar/sudah-tutup/');

               }
             
              
           }
           else{
                if ($cek_jadwal_regis->buka_registrasi_camaru > date('Y-m-d')) {
                    return redirect('/pendaftar/belum-buka/');
                }
           }
        


        return $next($request);
        
    }
}
