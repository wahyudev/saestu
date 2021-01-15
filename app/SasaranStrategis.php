<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SasaranStrategis extends Model
{
    protected $primaryKey='id_ss';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='sasaran_strategis';
    public function bidang()
    {
        return $this->belongsTo('App\Bidang','id_bidang','id_bidang');
    }
}
