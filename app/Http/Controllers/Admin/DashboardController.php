<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;
use DateTime;
use App\User;
use Tanggal;
use App\Rubrik;

class DashboardController extends Controller
{
   function __construct()
  {  
    $this->middleware('permission:read-dashboard-admin')->only('index');
   
  }
   public function index(Request $request)
   {
    return view('admin.dashboard.dashboard-page');
   }
}
