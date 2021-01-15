@extends('adminlte::page')

@section('title', 'Kelola Bidang')

@section('content_header')
    <h1>Kelola Bidang<small>Kelola bidang pada aplikasi</small></h1>
    <ol class="breadcrumb">
      <li class="active"><a href="{{url('admin/bidang')}}"><i class="fa fa-list"></i> Kelola Bidang</a></li>
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
            <a href="#add-bidang" data-toggle="modal"  class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Bidang</a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="table">
              <thead>
                <tr>
                  <th width="2%">No</th>
                  <th>Kode Bidang Kinerja</th>
                  <th>Bidang Kinerja</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($bidangs as $bidang)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <th>{{$bidang->kode_bidang}}</th>
                  <td>{{$bidang->nama_bidang}}</td>
                  <td>
                     <a onclick="editbidang('{{$bidang->id_bidang}}')" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a> | 
                    <a onclick="deletebidang('{{$bidang->id_bidang}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    <form id="{{$bidang->id_bidang}}" action="{{url('admin/bidang/'.$bidang->id_bidang)}}" method="post">
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
  <div class="modal fade" id="add-bidang">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{url('admin/bidang')}}" method="post" class="form-horizontal">
                @csrf
                <div class="modal-header">
                    <div class="modal-title">
                        <h3><b><i class="glyphicon glyphicon-plus"></i> Tambah Bidang Baru</b></h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Bidang</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_bidang" class="form-control" placeholder="Nama Bidang" required="">
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
  <div class="modal fade" id="edit-bidang">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="" id="form-edit-bidang" method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <div class="modal-title">
                        <h3><b><i class="fa fa-edit"></i> Edit Bidang AGA</b></h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Bidang</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_bidang" id="nama_bidang" class="form-control" placeholder="Nama Bidang" required="">
                        </div>
                    </div>
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
                    <button  class="btn btn-sm btn-info"><i class="glyphicon glyphicon-floppy-disk"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
@stop

@section('css')
  @include('plugins.alertify-css')
  @include('plugins.icon-picker-css')
@stop

@section('js')
  @include('plugins.alertify-js')
  @include('plugins.icon-picker-js')
    <script>
      function deletebidang(id,bidang) {
        alertify.confirm("Konfirmasi!","Apakah anda yakin menghapus bidang "+bidang+" ?",function(){
          $('#'+id).submit();
        },function(){

        })
      }
      function editbidang(id)
      {
         $.ajax({
            url:baseURL()+"/admin/bidang/"+id+"/edit",
            type:'get',
            success:function(data)
            {
                $('#edit-bidang').modal('show');
                var url=baseURL()+"/admin/bidang/"+id;
                $('#form-edit-bidang').attr('action',url);
                $('#nama_bidang').val(data.nama_bidang);    
            }
        });
      }
    </script>
@stop