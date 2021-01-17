<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluasiKinerja extends Model
{
    protected $primaryKey='id_ek';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='evaluasi_kinerja';

    public function indikator()
    {
    	return $this->belongsTo('App\IndikatorKinerja','id_ik','id_ik');
    }
    public function jabatan()
    {
    	return $this->belongsTo('App\Jabatan','id_jabatan','id_jabatan');
    }
    public function unit_kerja()
    {
    	return $this->belongsTo('App\UnitKerja','id_unit_kerja','id_unit_kerja');
    }
    public function parent()
    {
    	return $this->belongsToMany('App\EvaluasiKinerja','parent_evaluasi_kinerja','id_ek','id_parent_ek');
    }
    public function child()
    {
        return $this->belongsToMany('App\EvaluasiKinerja','parent_evaluasi_kinerja','id_parent_ek','id_ek');
    }
}
