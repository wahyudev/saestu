<?php
	namespace App\Http\Controllers\Admin;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\User;
	use DataTables;
	use Helpers;
  use Tanggal;
  use Excel;
  use Validator;
  use File;
  use Image;
  use App\Pegawai;
  use DB;
  use Uang;
	class LoadDataController extends Controller
	{   

  function __construct()
  {  
    // $this->middleware('permission:read-biaya-kuliah')->only('pilihPenerimaan','tampilRincian','totalCamaru','listDataSetUKT');
    // $this->middleware('permission:update-biaya-kuliah')->only('setBiaya','postSetBiaya','generateTagihan');
    
    
  }

  public function loadDosenPegawai(Request $request)
    {
      $datas=DB::table('kepeg.users as a')
        ->join('kepeg.pegawai as b','a.id','=','b.user_id')
        ->whereIn('b.status_keaktifan_pegawai_id',[1,2,3,4])
        ->where(function($q)use($request){
          $q->orWhere('a.nip','like','%'.$request->search.'%')
          ->where('a.username','like','%'.$request->search.'%')
          ->orWhere('b.nama_pegawai','like','%'.$request->search.'%');
        })
        ->take(50)->get();
        $json=[];
        if ($datas) {
          
          foreach ($datas as $data) {

             $json[] = ['id'=>$data->id_pegawai, 'text'=>$data->nip." - ".$data->gelar_depan." ".ucwords(strtolower($data->nama_pegawai)).", ".$data->gelar_belakang ];
              
              
          }
        }
      return response()->json($json);
    }

   
}
