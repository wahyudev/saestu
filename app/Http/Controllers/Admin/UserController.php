<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use  DataTables;
use Tanggal;
use Helpers;
use App\Biodata;
use App\Role;
use DB;
class UserController extends Controller
{   
  function __construct()
  {  
    $this->middleware('permission:read-user')->only('index','show');
    $this->middleware('permission:create-user')->only('create','store');
    $this->middleware('permission:update-user')->only('edit','update');
    $this->middleware('permission:delete-user')->only('destroy');
     $this->middleware('permission:export-excel')->only('exportExcel');
    
  }
  public function exportExcel()
  {
    echo "halos";
  }
  public function index(Request $request)
  {
    
    
    if ($request->ajax()) {
      $user=User::where('jenis_akun','admin')
      ->join('pegawai as a','a.nip','=','users.nip')
      ->select('users.*','a.nama_pegawai');
      return DataTables::of($user)
      ->addColumn('action',function($q){
        $html="<a class='btn btn-xs btn-info' href=\"".url('admin/manage-user/'.$q->id_user.'/edit')."\"><i class='fa fa-edit'></i> Edit</a> | ";
        $html.="<a class='btn btn-xs btn-danger' onclick=\"confirmation('$q->id_user')\"><i class='fa fa-trash'></i> Delete</a>";
        $html.="<form action='".url('admin/manage-user/'.$q->id_user)."' method='post' id='".$q->id_user."'>
        <input type='hidden' name='_method' value='DELETE'>
        <input type='hidden' name='_token' value='".csrf_token()."'>
        </form>";

        return $html;
      })
      ->addColumn('created_at',function($q){
        return Tanggal::time_indo($q->created_at);
      })
      ->addColumn('nama_gelar',function($q){
        return Helpers::nama_gelar($q->pegawai);
      })
      
      ->addColumn('roles', function (User $user) {
        return $user->roles->map(function($roles) {
          return "- ".$roles->nama_role;
        })->implode('<br>');
      })
      ->addColumn('level_akun', function ($a) {
        if ($a->level_akun=='0') {
          $level= "Universitas (All prodi)";
        }
      
        else  {
          $level="Per unit kerja";
          $level.="<ul>";
          foreach ($a->instansi as $instansi) {
            $level.="<li>".'('.$instansi->parent_unit_utama->ref_unit->singkatan_unit.') '.$instansi->ref_unit->nama_ref_unit_kerja_lengkap.'</li>';
          }
          $level.="</ul>";
          
        }
        return $level;
      })

      ->addIndexColumn()
      ->escapeColumns('action','roles')->make(true);
    }
    return view('admin.users.users-page');
  }

  
  public function create()
  {
    $roles=Role::all();
    return view('admin.users.create-users-page',compact('roles'));
  }

  public function store(Request $request)
  {
     
    $peg=DB::table('pegawai as a')
    ->join('dosen as b','a.id_pegawai','=','b.pegawai_id')
    ->join('users as c','c.id','=','a.user_id')
    ->where('a.id_pegawai',$request->id_pegawai)
    ->first();
    $store= new User();
    $store->id_user=$peg->id_pegawai;
    $store->username=$peg->username;
    $store->nip=$peg->nip;
    $store->status_akun='aktif';
    $store->jenis_akun='admin';
    $store->ganti_password=0;
    $store->level_akun=$request->level_akun;
    $store->save();
    $store->roles()->sync($request->roles);
    $store->instansi()->sync($request->id_unit_kerja);

    Helpers::alert('success','Akun baru berhasil ditambahakan');
    
    
    return redirect('admin/manage-user');
  }
  public function show($id)
  {
        //
  }

  public function edit($id)
  {
    $user=User::findOrFail($id);
    $user_roles=[];
    $roles=Role::all();
    $user_roles=[];
    $user_instansi=[];
    
    foreach ($user->roles as $role) {
      $user_roles[]=$role->id_role;
    }
    
    if ($user->level_akun=='1') {
    
      foreach ($user->instansi as $instansi) {
        $user_instansi[]=$instansi->id_unit_kerja;
      }
    }
    return view('admin.users.edit-users-page',compact('user_roles','user','roles','user_instansi'));
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user=User::where('id_user',$id);
      $update=$user->update(['level_akun'=>$request->level_akun]);
      $rolesupdate=$user->first()->roles()->sync($request->roles);  
      $instansiupdate=$user->first()->instansi()->sync($request->id_unit_kerja);
      
      Helpers::alert('success','Data pengguna berhasil diperbaharui');
      return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::where('id_user',$id)->delete();
      Helpers::alert('success','Data user berhasil dihapus');
      return back();
    }
    public function loadDosenPegawai(Request $request)
    {
      $datas=DB::table('users as a')->join('pegawai as b','a.id','=','b.user_id')
        ->where('a.username','like','%'.$request->search.'%')
        ->orWhere('a.nip','like','%'.$request->search.'%')
        ->orWhere('b.nama_pegawai','like','%'.$request->search.'%')
        ->take(50)->get();
        $json=[];
        if ($datas) {
          
          foreach ($datas as $data) {

             $json[] = ['id'=>$data->username, 'text'=>$data->nip." - ".$data->gelar_depan." ".ucwords(strtolower($data->nama_pegawai)).", ".$data->gelar_belakang ];
              
              
          }
        }
      return response()->json($json);
    }
  }
