<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluasiKinerja extends Model
{
    protected $primaryKey='id_ek';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='evaluasi_kinerja';
}
