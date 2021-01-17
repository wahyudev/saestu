<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tanggal;
use App\Permission;
use Helpers;
use App\Bidang;
use App\UnitKerjaJabatan;
use App\Jabatan;
use App\IndikatorKinerja;
use App\EvaluasiKinerja;
use DB;
class SetupJabatanIndikatorKinerjaController extends Controller
{
  
  public function index()
  {
    $pejabat=UnitKerjaJabatan::join('kepeg.jabatan as a','kepeg.unit_kerja_jabatan.jabatan_id','=','a.id_jabatan')->whereIn('a.jenis_jabatan_id',[1,5])->orderBy('a.urutan')->get();

    return view('admin.jabatan-indikator-kinerja.index',compact('pejabat'));
  }

  public function loadData(Request $r)
  {
    $tahun=2021;
    $indikator=IndikatorKinerja::orderBy('kode_iku')->get();
    $unit_jabatan=UnitKerjaJabatan::find($r->id_unit_kerja_jabatan);
    
    $pejabat=UnitKerjaJabatan::join('kepeg.jabatan as a','kepeg.unit_kerja_jabatan.jabatan_id','=','a.id_jabatan')->whereIn('a.jenis_jabatan_id',[1,5])->orderBy('a.urutan')->get();
    
    $jabatan_indikator=[];

    $data=EvaluasiKinerja::where('id_jabatan',$unit_jabatan->jabatan_id)->where('id_unit_kerja',$unit_jabatan->unit_kerja_id)->where('tahun',$tahun)->get();
    foreach ($data as $key => $value) {
      $jabatan_indikator[]=$value->id_ik;
    }
    $unit_jabatan_atasan=UnitKerjaJabatan::join('kepeg.jabatan as a','a.id_jabatan','=','kepeg.unit_kerja_jabatan.jabatan_id')->orderBy('a.urutan')->whereIn('jenis_jabatan_id',[1,5])->get();
    $view = view('admin.jabatan-indikator-kinerja.load-data',compact('indikator','unit_jabatan','jabatan_indikator','tahun','pejabat','unit_jabatan_atasan'))->render();
    return response()->json($view);
  }

  public function postSetupJabatan(Request $request)
  {
    
    
    if ($request['id_ik']==null) {
      $request['id_ik']=[];
    }
    for ($i=0; $i<count($request['id_ik']);$i++) {
      

        $arr['id_jabatan']=$request->id_jabatan;
        $arr['id_unit_kerja']=$request->id_unit_kerja;
        $arr['id_ik']=$request['id_ik'][$i];
        $arr['tahun']=$request->tahun;
      
      $cek=EvaluasiKinerja::where($arr)->first();
      if (!$cek) {

        EvaluasiKinerja::create($arr);
      }else{
        EvaluasiKinerja::where($arr)->update($arr);
      }
      
    }
    EvaluasiKinerja::whereNotIn('id_ik',$request['id_ik'])->where('id_jabatan',$request->id_jabatan)->where('id_unit_kerja',$request->id_unit_kerja)->where('tahun',$request->tahun)->delete();
   


    
    
  }

  public function postSetupJabatanSimpanParent(Request $request)
  { 
    
    $res['pesan']="";

    if ($request['id_unit_kerja_jabatan_atasan']==null) {
      
      $ek=EvaluasiKinerja::where([
        'id_ik'=>$request->id_ik,
        'tahun'=>$request->tahun,
        'id_unit_kerja'=>$request->id_unit_kerja_ek,
        'id_jabatan'=>$request->id_jabatan_ek,
        
      ])->first();
      DB::table('parent_evaluasi_kinerja')->where('id_ek',$ek->id_ek)->delete();
      $res['result']=1;
      $res['pesan']='Berhasil Simpan Data';
    }else{
      $cek2=EvaluasiKinerja::where([
            'id_ik'=>$request->id_ik,
            'tahun'=>$request->tahun,
            'id_unit_kerja'=>$request->id_unit_kerja_ek,
            'id_jabatan'=>$request->id_jabatan_ek,
      ])->first();
      
      DB::table('parent_evaluasi_kinerja')->where('id_ek',$cek2->id_ek)->delete();
      for ($i=0; $i <count($request['id_unit_kerja_jabatan_atasan']) ; $i++) { 
        
        $unit_kerja_jabatan=UnitKerjaJabatan::find($request['id_unit_kerja_jabatan_atasan'][$i]);
        $cek=EvaluasiKinerja::where('id_ik',$request->id_ik)->where('id_jabatan',$unit_kerja_jabatan->jabatan_id)->where('id_unit_kerja',$unit_kerja_jabatan->unit_kerja_id)->where('tahun',$request->tahun)->first();
        $indikator=IndikatorKinerja::find($request->id_ik);
        if ($cek) {
          
          
          DB::table('parent_evaluasi_kinerja')->insert([
            'id_ek'=>$cek2->id_ek,
            'id_parent_ek'=>$cek->id_ek,
          ]);
          $res['result']=1;
          $res['pesan'].='Berhasil set pejabat '.Helpers::pejabat($unit_kerja_jabatan).' pada indikator '.$indikator->nama_ik.'<br>';
        }else{
          $res['result']=0;
          $res['pesan'].='Pejabat '.Helpers::pejabat($unit_kerja_jabatan).' belum memiliki indikator '.$indikator->nama_ik;
          return response()->json($res);
        }
      }
    }

    return response()->json($res);
  }

  public function edit($id)
  {
    $bidang=Bidang::findOrFail($id);
    return response()->json($bidang);
  }

  
  public function update(Request $request, $id)
  {
    $bidang=Bidang::findOrFail($id);
    $update=$bidang->update($request->except('_token','_method'));
    Helpers::alert('success','Bidang berhasil diperbaharui');
    return back();
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Bidang::find($id)->delete();
      Helpers::alert('success','Bidang berhasil dihapus');
      return back();
    }
  }
