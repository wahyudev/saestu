<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $primaryKey='id_bidang';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='bidang_kinerja';

}
