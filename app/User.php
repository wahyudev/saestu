<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $incrementing = false;
    protected $primaryKey='id_user';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role','users_has_roles','user_id','role_id');
    }
    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai','id_user','id_pegawai');
    }
    
    public function instansi()
    {
        return $this->belongsToMany('App\UnitKerja','user_instansi','id_user','id_unit_kerja');
    }

    public function id_instansi()
    {
        $instansi=[];
        foreach (auth()->user()->instansi as $v) {
            $instansi[]=$v->id_unit_kerja;
        }

        return $instansi;
    }
    
    
    public function hasRole($id_role)
    {
        $roles=[];
        foreach (auth()->user()->roles as $r) {
            $roles[]=$r->id_role;
        }

        if (in_array($id_role,$roles)) return true;
        else return false;
        
    }

    public function cek_akses($permission)
    {
        $allpermission=[];

        foreach (auth()->user()->roles as $r) {
            foreach ($r->permissions as $p) {
                $allpermission[]=$p->permission;
            }
        }
        if (in_array($permission,$allpermission)) return true;
        else return false;

    }
}
