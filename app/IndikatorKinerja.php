<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndikatorKinerja extends Model
{
    protected $primaryKey='id_ik';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='indikator_kinerja';
    public function sasaran()
    {
        return $this->belongsTo('App\SasaranStrategis','id_ss','id_ss');
    }
}
