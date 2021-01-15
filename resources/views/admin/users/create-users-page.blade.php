@extends('adminlte::page')

@section('title', 'Manage User')

@section('content_header')
    <h1>Tambah User<small>Tambah pengguna baru</small></h1>
    <ol class="breadcrumb">
      <li ><a href="{{url('admin/manage-user')}}"><i class="fa fa-user"></i> Kelola user</a></li>
      <li class="active"><a href="{{url('admin/manage-user/create')}}"> Tambah user</a></li>
    </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      @if(Session::has('alert'))
        @include('layouts.alert')
      @endif
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah pengguna baru</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{url('admin/manage-user')}}">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Pilih User</label>

              <div class="col-sm-7">
                <select   class="form-control"  name="id_pegawai" id="id_pegawai">
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Level Akses</label>

              <div class="col-sm-7">
                <select class="form-control" name="level_akun" id="level_akun" onchange="load_instansi()">
                  
                  <option value="0"  >Universitas (All)</option>
                  <option value="1" >Per Unit Kerja</option>   
                </select>
              </div>
            </div>
            <div class="form-group" id="unit_kerja" style="display:none;">
              <label for="inputEmail3" class="col-sm-2 control-label">Unit Kerja</label>

              <div class="col-sm-7">
                <select class="form-control select2" multiple="" name="id_unit_kerja[]" multiple="" style="width: 100%">
                  @foreach(App\UnitKerja::get() as $unit)
                  <option value="{{$unit->id_unit_kerja}}" >{{' ('.$unit->parent_unit_utama->ref_unit->singkatan_unit.') '.$unit->ref_unit->nama_ref_unit_kerja_lengkap}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-7">
                <div class="checkbox">
                  @foreach($roles as $role)
                  <label class="col-sm-3">
                    <input type="checkbox" name="roles[]" value="{{$role->id_role}}"> {{$role->nama_role}}
                  </label>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-7">
                <button class="btn btn-sm btn-primary" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
              </div>
            </div>
          </div>
          <div class="box-footer">
            
          </div>
        </form>
      </div>
    </div>
  </div>
@stop

@section('css')
  @include('plugins.alertify-css')
@stop

@section('js')
  @include('plugins.alertify-js')
    <script>

      function confirmation(id) {
        alertify.confirm("Confirmation!","Are sure to delete this data?",function(){
          $('#'+id).submit();
        },function(){

        });
      }
      $(".select2").select2();
      $("#id_pegawai").select2({
          placeholder:"Tentukan dosen atau pegawai..",
          ajax:{
              url:"{{url('admin/load-dosen-pegawai')}}",
              dataTyper:"json",
              data:function(param)
              {
                  var value= {
                      search:param.term,
                  }
                  return value;
              },
              processResults:function(hasil)
              {  

                  return {
                      results:hasil,
                  }
              }
          }
        });



      
      
      $("#level_akun").on("change",function(){
        if ($(this).val()=='0') $("#unit_kerja").css('display','none');
        
        else $("#unit_kerja").css('display','');
      });
      
      
    </script>
@stop