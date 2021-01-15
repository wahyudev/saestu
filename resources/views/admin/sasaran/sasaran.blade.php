@extends('adminlte::page')

@section('title', 'Kelola Sasaran Strategis')

@section('content_header')
    <h1>Kelola Sasaran Strategis<small>Kelola sasaran strategis pada aplikasi</small></h1>
    <ol class="breadcrumb">
      <li class="active"><a href="{{url('admin/sasaran-strategis')}}"><i class="fa fa-list"></i> Kelola Sasaran Strategis</a></li>
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
            <a onclick="tambah()" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Sasaran Strategis</a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="table">
              <thead>
                <tr>
                  <th width="2%">No</th>
                  <th>Nama Bidang</th>
                  <th>Kode Sasaran </th>
                  <th>Nama Sasaran Strategis</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($sasarans as $sasaran)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$sasaran->bidang->nama_bidang}}</td>
                  <td>{{$sasaran->kode_ss}}</td>
                  <td>{{$sasaran->nama_ss}}</td>
                  <td>
                     <a onclick="editsasaran('{{$sasaran->id_ss}}')" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a> | 
                    <a onclick="deletesasaran('{{$sasaran->id_ss}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    <form id="{{$sasaran->id_ss}}" action="{{url('admin/sasaran-strategis/'.$sasaran->id_ss)}}" method="post">
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
                        <label class="control-label col-sm-3">Bidang</label>
                        <div class="col-sm-8">
                            <select name="id_bidang" id="id_bidang" class="form-control" required="">
                              <option value="">Pilih Bidang</option>
                              @foreach(App\Bidang::get() as $j )
                              <option value="{{$j->id_bidang}}">{{$j->nama_bidang}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Sasaran</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_ss" id="nama_ss" class="form-control" placeholder="Nama Sasaran Strategis" required="">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                    <button  class="btn btn-sm btn-info"><i class="glyphicon glyphicon-floppy-disk"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>

<!-- <div class="modal fade" id="edit-sasaran">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="" id="form-edit-bidang" method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <div class="modal-title">
                        <h3><b><i class="fa fa-edit"></i> Edit Sasaran</b></h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Bidang</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_bidang" id="nama_bidang" class="form-control" placeholder="Nama Bidang" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Sasaran</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_ss" id="nama_ss" class="form-control" placeholder="Nama Sasaran Strategis" required="">
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
  </div> -->


@stop

@section('css')
  @include('plugins.alertify-css')
@stop

@section('js')
  @include('plugins.alertify-js')
    <script>
      function deletesasaran(id,sasaran) {
        alertify.confirm("Konfirmasi!","Apakah anda yakin menghapus sasaran strategis "+sasaran+" ?",function(){
          $('#'+id).submit();
        },function(){

        })
      }
     
     function tambah()
      {
        $('#modal').modal('show');
        $('#method').html("");
        var url=baseURL()+"/admin/sasaran-strategis";
        $('#modal-form').attr('action',url);
        $('#judul').html("<i class='fa fa-plus'></i> Tambah Sasaran Strategis");
        $('#id_bidang').val("");
        $('#nama_ss').val("");
        
      }
      // function hapus(id,skema) {
      //   alertify.confirm("Konfirmasi!","Apakah anda yakin menghapus jenis skema "+skema+" ?",function(){
      //     $('#'+id).submit();
      //   },function(){

      //   })
      // }
      function editsasaran(id)
      {
         $.ajax({
            url:baseURL()+"/admin/sasaran-strategis/"+id+"/edit",
            type:'get',
            success:function(data)
            {
                $('#modal').modal('show');
                $('#method').html("<input type='hidden' name='_method' value='PUT'>");
                $('#judul').html("<i class='fa fa-edit'></i> Edit Sasaran Strategis");
                var url=baseURL()+"/admin/sasaran-strategis/"+id;
                $('#modal-form').attr('action',url);
                $('#id_bidang').val(data.id_bidang);
                $('#nama_ss').val(data.nama_ss);
              
                        
            }
        });
      }
    </script>
@stop