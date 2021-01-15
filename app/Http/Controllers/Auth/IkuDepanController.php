<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tanggal;
use App\Permission;
use Helpers;
use App\UnitKerjaJabatan;

class IkuDepanController extends Controller
{
  
  public function index()
  {
    $data=UnitKerjaJabatan::join('jabatan as a','a.id_jabatan','=','unit_kerja_jabatan.jabatan_id')
          ->whereIn('a.id_jabatan',['37','47','50','48','49','34','26','27','32','29','24','25','44','46','45','40','42','33','31','39','41','208'])
          ->whereHas('unit_kerja',function($q){
            $q->where('aktif',1);
          })
          ->orderBy('urutan', 'ASC')->get();
    
    return view('admin.unit-kerja-jabatan.index',compact('data'));
  }

  public function store(Request $request)
  {
    UnitKerjaJabatan::create($request->all());
    Helpers::alert('success','Evaluasi Kinerja berhasil dibuat ');
    return back();
  }

  public function edit($id)
  {
    $evaluasi=UnitKerjaJabatan::findOrFail($id);
    return response()->json($evaluasi);
  }

  
  public function update(Request $request, $id)
  {
    $evaluasi=UnitKerjaJabatan::findOrFail($id);
    $update=$evaluasi->update($request->except('_token','_method'));
    Helpers::alert('success','Evaluasi Kinerja berhasil diperbaharui');
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
      UnitKerjaJabatan::find($id)->delete();
      Helpers::alert('success','Evaluasi Kinerja berhasil dihapus');
      return back();
    }
  }
