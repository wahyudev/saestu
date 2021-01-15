<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tanggal;
use App\Permission;
use Helpers;
use App\IndikatorKinerja;

class IndikatorKinerjaController extends Controller
{
    public function index()
  {
    $indikators=IndikatorKinerja::all();
    return view('admin.indikator.indikator',compact('indikators'));
  }

  public function store(Request $request)
  {
    IndikatorKinerja::create($request->all());
    Helpers::alert('success','indikator berhasil dibuat ');
    return back();
  }

  public function edit($id)
  {
    $indikator=IndikatorKinerja::findOrFail($id);
    return response()->json($indikator);
  }

  
  public function update(Request $request, $id)
  {
    $indikator=IndikatorKinerja::findOrFail($id);
    $update=$indikator->update($request->except('_token','_method'));
    Helpers::alert('success','indikator berhasil diperbaharui');
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
      IndikatorKinerjas::find($id)->delete();
      Helpers::alert('success','indikator berhasil dihapus');
      return back();
    }
}
