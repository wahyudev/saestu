<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tanggal;
use App\Permission;
use Helpers;
use App\EvaluasiKinerja;
class EvaluasiKinerjaController extends Controller
{
  

  public function index(Request $r)
  {
    $evaluasis=EvaluasiKinerja::all();
    return view('admin.evaluasi.index',compact('evaluasis'));
  }

  
  public function store(Request $request)
  {
    EvaluasiKinerja::create($request->all());
    Helpers::alert('success','Evaluasi Kinerja berhasil dibuat ');
    return back();
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
