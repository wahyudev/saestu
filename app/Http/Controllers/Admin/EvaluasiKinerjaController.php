<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tanggal;
use App\Permission;
use Helpers;
use App\EvaluasiKinerja;
use App\UnitKerjaJabatan;
use DataTables;
class EvaluasiKinerjaController extends Controller
{
  

  public function index(Request $request)
  {
    $pejabat=UnitKerjaJabatan::join('kepeg.jabatan as a','a.id_jabatan','=','kepeg.unit_kerja_jabatan.jabatan_id')->orderBy('a.urutan')->whereIn('jenis_jabatan_id',[1,5])->get();
    if ($request->ajax()) {
      $pejabat=explode(';',$request->pejabat);
      $ek=EvaluasiKinerja::where('id_unit_kerja',$pejabat[0])
      ->where('id_jabatan',$pejabat[1])
      ->where('tahun',$request->tahun);
      

      return DataTables::of($ek)
      ->addColumn('action',function($q){
        // $html="<a class='btn btn-xs btn-info' href=\"".url('admin/evaluasi-kinerja/'.$q->id_ek.'/edit')."\"><i class='fa fa-edit'></i> Edit</a> | ";
        // $indikator=$q->indikator->nama_ik.' pada jabatan '.$q->jabatan->nama_jabatan.'  '.$q->unit_kerja->ref_unit->nama_di_plo;
        // $html.="<a class='btn btn-xs btn-danger' onclick=\"confirmation('$q->id_ek','$indikator')\"><i class='fa fa-trash'></i> Delete</a>";
        // $html.="<form action='".url('admin/evaluasi-kinerja/'.$q->id_ek)."' method='post' id='".$q->id_ek."'>
        // <input type='hidden' name='_method' value='DELETE'>
        // <input type='hidden' name='_token' value='".csrf_token()."'>
        // </form>";

        // if ($q->id_parent != 0||$q->id_parent !=null ) {
        //   $html="<a class='btn btn-xs btn-success' href=\"".url('admin/evaluasi-kinerja/'.$q->tahun.'/'.$q->id_ek)."\"><i class='fa fa-edit'></i> Edit</a> | ";
        // }
        // return $html;
      })
      ->addColumn('nama_indikator',function($q){
        return $q->indikator->nama_ik;
      })
      ->addColumn('bertanggungjawab_ke',function($q){

        $data="Tidak ada";
        if (count($q->parent)!=0) {
          $data='<ul>';
          foreach ($q->parent as $key => $value) {
            $data.='<li>'.Helpers::pejabat($value).'</li>';
          }
          $data.='</ul>';
        }
        return $data;
      })
      ->addColumn('diperoleh_dari',function($q){

        $data="Diperoleh dari sini";
        if (count($q->child)!=0) {
          $data='<ul>';
          foreach ($q->child as $key => $value) {
            $data.='<li>'.Helpers::pejabat($value).'</li>';
          }
          $data.='</ul>';
        }
        return $data;
      })
      

      ->addIndexColumn()
      ->escapeColumns('action','roles')->make(true);
    }
    return view('admin.evaluasi.index',compact('pejabat'));
  }

  
  public function store(Request $request)
  {

    $input=$request->except('id_jabatan_atasan','id_unit_kerja_jabatan','id_unit_kerja_jabatan_atasan');
    $cek_unit_jabatan=UnitKerjaJabatan::find($request->id_unit_kerja_jabatan);
    
    
    if (!$cek_unit_jabatan) {
      Helpers::alert('danger','Jabatan yg dipilih bukan pejabat struktual');
      return back();
    }else{

      
          $cek_ada=EvaluasiKinerja::where('id_unit_kerja',$cek_unit_jabatan->unit_kerja_id)
                    ->where('id_jabatan',$cek_unit_jabatan->jabatan_id)
                    ->where('tahun',$input['tahun'])
                    ->first();
          
          if (!$cek_ada) {
            $input['id_unit_kerja']=$cek_unit_jabatan->unit_kerja_id;
            $input['id_jabatan']=$cek_unit_jabatan->jabatan_id;
            if (isset($request->id_unit_kerja_jabatan_atasan)&&$request->id_unit_kerja_jabatan_atasan!=0) {
                $unit_jabatan_atasan=UnitKerjaJabatan::find($request->id_unit_kerja_jabatan_atasan);

                $cek_ada_ek=EvaluasiKinerja::where('id_unit_kerja',$unit_jabatan_atasan->unit_kerja_id)
                    ->where('id_jabatan',$unit_jabatan_atasan->jabatan_id)
                    ->where('tahun',$input['tahun'])
                    ->first();
                if (!$cek_ada_ek) {
                  Helpers::alert('belum ada indikator kinerja untuk pejabat '.$unit_jabatan_atasan->jabatan->nama_jabatan);
                  return back();
                }
                $input['id_parent']=$cek_ada_ek->id_ek;
            }else{
               $input['id_parent']=0;
            }  
            EvaluasiKinerja::create($input);
          }
      
      Helpers::alert('success','Evaluasi Kinerja berhasil dibuat ');
      return back();
    }
  }

  public function edit($id)
  {
    $evaluasi=EvaluasiKinerja::findOrFail($id);
    return response()->json($evaluasi);
  }

  
  public function update(Request $request, $id)
  {
    $evaluasi=EvaluasiKinerja::findOrFail($id);
    $update=$evaluasi->update($request->except('_token','_method'));
    Helpers::alert('success','SEvaluasi Kinerja berhasil diperbaharui');
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
      EvaluasiKinerja::find($id)->delete();
      Helpers::alert('success','Evaluasi Kinerja berhasil dihapus');
      return back();
    }
  }
