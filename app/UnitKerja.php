<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class UnitKerja extends Model
{
  
  protected $primaryKey='id_unit_kerja';
  protected $guarded=[];
  public $timestamps=false;
  protected $table='kepeg.unit_kerja';

  public function ref_unit()
  { 
    return $this->belongsTo('App\ReferensiUnitKerja','referensi_unit_kerja_id','id_ref_unit_kerja');
  }
  public function parent_unit()
  { 
    return $this->belongsTo('App\UnitKerja','parent_unit_id','id_unit_kerja');
  }
  public function parent_unit_utama()
  { 
    return $this->belongsTo('App\UnitKerja','parent_unit_utama_id','id_unit_kerja');
  }
  
  public function scopeFilterUnit()
  {
    

      $unit=[];
      foreach (auth()->user()->instansi as $v) {
        $unit[]=$v->id_unit_kerja;
      }
      return $this->whereIn('id_unit_kerja',$unit);
    
  }
    
    

}
