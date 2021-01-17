<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $primaryKey='id_wilayah';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='kepeg.wilayah';
    public $incrementing = false;

    public function kabupaten_kota()
    {
      return $this->belongsTo('App\Wilayah','id_induk_wilayah','id_wilayah');
    }
    public function kecamatan()
    {
      return $this->belongsTo('App\Wilayah','id_induk_wilayah','id_wilayah');
    }
    public function provinsi()
    {
      return $this->belongsTo('App\Wilayah','id_induk_wilayah','id_wilayah');
    }

    

    

}
