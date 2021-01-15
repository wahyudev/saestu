<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tanggal;
use App\Permission;
use Helpers;
use App\UnitKerjaJabatan;

class UnitKerjaJabatanController extends Controller
{
  
  public function index()
  {
    $data=UnitKerjaJabatan::whereHas(function($q){
      $q -> whereIn('urutan',['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','23','25','27','31']);

    })->get();
      dd($data);
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
      UnitKerjaJabatan::find($id)->delete();
      Helpers::alert('success','Evaluasi Kinerja berhasil dihapus');
      return back();
    }
  }
