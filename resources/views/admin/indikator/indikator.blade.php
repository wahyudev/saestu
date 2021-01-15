@extends('adminlte::page')

@section('title', 'Kelola Indikator Kinerja')

@section('content_header')
    <h1>Kelola Indikator Kinerja</h1>
    <ol class="breadcrumb">
      <li class="active"><a href="{{url('admin/indikator-kinerja')}}"><i class="fa fa-list"></i> Kelola Indikator Kinerja</a></li>
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
          <div class="pull-right">
            <a onclick="tambah()" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Indikator Kinerja</a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="table">
              <thead>
                <tr>
                  <th width="2%">No</th>
                  <th>Nama Bidang</th>
                  <th>Nama Sasaran Strategis</th>
                  <th>Kode IKU</th>
                  <th>Nama Indikator Kinerja</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($indikators as $indikator)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$indikator->sasaran->bidang->nama_bidang}}</td>
                  <td>{{$indikator->sasaran->nama_ss}}</td>
                  <td>{{$indikator->kode_iku}}</td>
                  <td>{{$indikator->nama_ik}}</td>
                  <td>
                     <a onclick="edit('{{$indikator->id_ik}}')" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a> | 
                    <a onclick="hapus('{{$indikator->id_k}}','{{$indikator->nama_ik}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    <form id="{{$indikator->id_ik}}" action="{{url('admin/indikator-kinerja/'.$indikator->id_ik)}}" method="post">
                      @csrf
                      @method('DELETE')
                      </form>
                    </li>
                  </td>
                </tr>
                @empty
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
 
 <div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" id="modal-form" method="post" class="form-horizontal">
                @csrf
                <div id="method"></div>
                <div class="modal-header">
                    <div class="modal-title">
                        <h3 id="judul"></h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Sasaran Strategis</label>
                        <div class="col-sm-8">
                            <select name="id_ss" id="id_ss" class="form-control" required="">
                              <option value="">Pilih Indikator Kinerja</option>
                              @foreach(App\SasaranStrategis::get() as $j )
                              <option value="{{$j->id_ss}}">{{$j->nama_ss}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kode IKU</label>
                        <div class="col-sm-8">
                            <input type="text" name="kode_iku" id="kode_iku" class="form-control" placeholder="Kode IKU" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Indikator Kinerja</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_ik" id="nama_ik" class="form-control" placeholder="Nama Indikator Kinerja" required="">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                    <button  class="btn btn-sm btn-info"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
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
      function hapus(id,indikator) {
        alertify.confirm("Konfirmasi!","Apakah anda yakin menghapus Indikator Kinerja "+indikator+" ?",function(){
          $('#'+id).submit();
        },function(){

        })
      }
     
     function tambah()
      {
        $('#modal').modal('show');
        $('#method').html("");
        var url=baseURL()+"/admin/indikator-kinerja";
        $('#modal-form').attr('action',url);
        $('#judul').html("<i class='fa fa-plus'></i> Tambah Indikator Kinerja");
        $('#id_ss').val("");
        $('#kode_iku').val("");
        $('#nama_ik').val("");
        
      }
      // function hapus(id,skema) {
      //   alertify.confirm("Konfirmasi!","Apakah anda yakin menghapus jenis skema "+skema+" ?",function(){
      //     $('#'+id).submit();
      //   },function(){

      //   })
      // }
      function edit(id)
      {
         $.ajax({
            url:baseURL()+"/admin/indikator-kinerja/"+id+"/edit",
            type:'get',
            success:function(data)
            {
                $('#modal').modal('show');
                $('#method').html("<input type='hidden' name='_method' value='PUT'>");
                $('#judul').html("<i class='fa fa-edit'></i> Edit Indikator Kinerja");
                var url=baseURL()+"/admin/indikator-kinerja/"+id;
                $('#modal-form').attr('action',url);
                $('#id_ss').val(data.id_ss);
                $('#kode_iku').val(data.kode_iku);
                $('#nama_ik').val(data.nama_ik);
              
                        
            }
        });
      }
    </script>
@stop