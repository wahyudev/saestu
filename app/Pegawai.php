<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $primaryKey='id_pegawai';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='pegawai';

    // public function biodata()
    // { 
    //   return $this->hasOne('App\Biodata','pegawai_id','id_pegawai');
    // }

    public function kerja_tambahan()
    { 
      return $this->hasMany('App\KerjaTambahan','pegawai_id','id_pegawai')->where('set_kerja_tambahan_aktif',1);
    }

    
    
    

}
