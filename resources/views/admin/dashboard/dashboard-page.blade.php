@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h1>
  Dashboard
</h1>
<ol class="breadcrumb">
  <li class="active"><a href="#"><i class="fa fa-desktop"></i> Dashboard</a></li>
  
</ol>

@stop

@section('content')

<div class="row">
  <div class="col-lg-4 col-md-8 col-xs-12">
      
    <div class="box box-info">
      <div class="box-header ">
        <h4><b>Selamat datang <font style="color:#cb5821;">{{Helpers::nama_gelar(auth()->user()->pegawai)}}</font> di Sistem Ragam Aktivitas Dosen Universitas Jambi</b></h4>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-lg-2">    
          </div>
          <div class="col-lg-10">
            <div class="table-responsiv">
              <table class="table">
                <tr>
                  <td width="30%">Nama </td><td width="1%">:</td><td>{{Helpers::nama_gelar(auth()->user()->pegawai)}}</td>
                  
                </tr>
                <tr>
                  <td>NIP/NIK</td><td>:</td><td>{{auth()->user()->pegawai->nip}}</td>
                
                </tr>
               
                <tr>
                  <td>Otoritas/Role </td><td width="2%">:</td>
                  <td>
                    
                      @foreach(auth()->user()->roles as $i)
                      - {!!$i->nama_role."<br>"!!}
                      @endforeach
                  </td>                      
                </tr>
              
                
                <tr>
                  <td>Unit yang dikelola </td><td width="2%">:</td>
                  <td>
                      @if(auth()->user()->level_akun==0)
                        Semua Unit Kerja
                      @else
                      @foreach(auth()->user()->instansi as $i)
                      - {!!$i->ref_unit->nama_ref_unit_kerja_lengkap."<br>"!!}
                      @endforeach
                      @endif
                  </td>                      
                </tr>
              </table>
            </div>
          </div>
         
        </div>
      </div>
    </div> 
  </div>

</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">   
@stop