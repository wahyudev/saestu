@extends('adminlte::page')

@section('title', 'Jabatan Indikator Kinerja')

@section('content_header')
    <h1>Jabatan Indikator Kinerja</h1>
    <ol class="breadcrumb">
      <li class="active"><a href="{{url('admin/setup-jabatan-indikator-kinerja')}}"><i class="fa fa-user"></i> Jabatan Indikator Kinerja</a></li>
    </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      @if(Session::has('alert'))
        @include('layouts.alert')
      @endif
      <div class="box box-info">
        <div class="box-header with-border">
          <div class="form-group col-lg-4">
            <label>Pilih Jabatan</label>
            <select name="id_unit_kerja_jabatan" id='id_unit_kerja_jabatan' class="form-control select2" onchange="load_data()">
              
              @foreach($pejabat as $j)
              <option value="{{$j->id_unit_kerja_jabatan}}">{{Helpers::pejabat($j)}}</option>
              @endforeach
            </select>
          </div>
          
        </div>
        <div class="box-body">
          <div id="html-iku"></div>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
  @include('plugins.alertify-css')
@stop

@section('js')
  @include('plugins.alertify-js')
   <script type="text/javascript">
     load_data();
     function load_data() {
       $.ajax({
          url:"{{url('admin/load-jabatan-indikator-kinerja')}}",
          type:'get',
          data:{
            id_unit_kerja_jabatan:$("#id_unit_kerja_jabatan").val(),
          },
          beforeSend:function(){
            $("#html-iku").html('Sedang memporses..');            
            
          },
          success:function(data)
          {
            
            $("#html-iku").html(data);
            
          }

       });
     }


   </script>
@stop