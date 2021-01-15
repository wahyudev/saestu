<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tanggal;
use App\Permission;
use Helpers;
use App\SasaranStrategis;
class SasaranStrategisController extends Controller
{
  

  public function index()
  {
    $sasarans=SasaranStrategis::all();
    return view('admin.sasaran.sasaran',compact('sasarans'));
  }

  
  public function store(Request $request)
  {
    SasaranStrategis::create($request->all());
    Helpers::alert('success','Sasaran Strategis berhasil dibuat ');
    return back();
  }

  public function edit($id)
  {
    $sasaran=SasaranStrategis::findOrFail($id);
    return response()->json($sasaran);
  }

  
  public function update(Request $request, $id)
  {
    $sasaran=SasaranStrategis::findOrFail($id);
    $update=$sasaran->update($request->except('_token','_method'));
    Helpers::alert('success','Sasaran Strategis berhasil diperbaharui');
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
      SasaranStrategis::find($id)->delete();
      Helpers::alert('success','Sasaran Strategis berhasil dihapus');
      return back();
    }
  }
