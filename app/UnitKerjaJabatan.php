<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitKerjaJabatan extends Model
{
    protected $primaryKey='id_unit_kerja_jabatan';
    protected $guarded=[];
    public $timestamps=false;
    protected $table='unit_kerja_jabatan';
    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan','jabatan_id','id_jabatan');
        
    }
    public function unit_kerja()
    {
        return $this->belongsTo('App\UnitKerja','unit_kerja_id','id_unit_kerja');
    }

}
