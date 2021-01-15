<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tanggal;
use App\Permission;
use Helpers;
use App\Bidang;

class BidangController extends Controller
{
  
  public function index()
  {
    $bidangs=Bidang::all();
    return view('admin.bidang.index',compact('bidangs'));
  }

  public function store(Request $request)
  {
    Bidang::create($request->all());
    Helpers::alert('success','Bidang berhasil dibuat ');
    return back();
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
