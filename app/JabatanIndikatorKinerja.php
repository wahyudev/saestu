<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JabatanIndikatorKinerja extends Model
{
    protected $primaryKey='id_jabatan_indikator_kinerja';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='jabatan_indikator_kinerja';


    public function indikator()
    {
    	return $this->belongsTo('App\IndikatorKinerja','id_ik','id_ik');
    }
    public function jabatan()
    {
    	return $this->belongsTo('App\Jabatan','id_jabatan','id_jabatan');
    }

    

    
    
    

}
