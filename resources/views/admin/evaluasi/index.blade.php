@extends('adminlte::page')

@section('title', 'Kelola Evaluasi Kinerja')

@section('content_header')
    <h1>Kelola Evaluasi Kinerja</h1>
    <ol class="breadcrumb">
      <li class="active"><a href="{{url('admin/evaluasi-kinerja')}}"><i class="fa fa-list"></i> Kelola Evaluasi Kinerja</a></li>
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
          <form>
            <div class="form-group col-lg-4">
              <label>Tahun</label>
              <select class="form-control" name="tahun" onchange="load_data()">
                @for($i=date('Y'); $i >= date('Y')-5; $i-- )
                <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
            <div class="form-group col-lg-4">
              <label>Unit Kerja</label>
              <select class="form-control" name="id_unit_kerja" onchange="load_data()">
                @foreach(App\UnitKerja::filterunit()->get() as $unit)
                <option value="{{$unit->id_unit_kerja}}">{{$unit->ref_unit->nama_ref_unit_kerja_lengkap}}</option>
                @endforeach
              </select>
            </div>
            
          </form>
          
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="table">
              <thead>
                <tr>
                  <th width="2%">No</th>
                  <th>Nama Indikator Kinerja</th>
                  <th>Nama Baseline</th>
                  <th>Nama Target</th>
                  <th>Nama Realisasi</th>
                  <th>Nama Bobot</th>
                  <th>Nama Skor</th>
                  <th>Nama Nilai IKU</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($evaluasis as $evaluasi)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$evaluasi->id_bidang}}</td>
                  <td>{{$evaluasi->id_ss}}</td>
                  <td>{{$evaluasi->id_ik}}</td>
                  <td>{{$evaluasi->baseline}}</td>
                  <td>{{$evaluasi->target}}</td>
                  <td>{{$evaluasi->realisasi}}</td>
                  <td>{{$evaluasi->bobot}}</td>
                  <td>{{$evaluasi->skor}}</td>
                  <td>{{$evaluasi->nilai_iku}}</td>
                  <td>
                     <a onclick="editevaluasi('{{$evaluasi->id_ek}}')" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a> | 
                    <a onclick="deleteevaluasi('{{$evaluasi->id_ek}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    <form id="{{$evaluasi->id_ek}}" action="{{url('admin/evaluasi-kinerja/'.$evaluasi->id_ek)}}" method="post">
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
  <div class="modal fade" id="add-evaluasi">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{url('admin/evaluasi-kinerja')}}" method="post" class="form-horizontal">
                @csrf
                <div class="modal-header">
                    <div class="modal-title">
                        <h3><b><i class="glyphicon glyphicon-plus"></i> Tambah Evaluasi Kinerja Baru</b></h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Baseline</label>
                        <div class="col-sm-8">
                            <input type="text" name="baseline" class="form-control" placeholder="Baseline" required="">
                        </div>
                    </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Target</label>
                        <div class="col-sm-8">
                            <input type="text" name="target" class="form-control" placeholder="Target" required="">
                        </div>
                    </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Realisasi</label>
                        <div class="col-sm-8">
                            <input type="text" name="realisasi" class="form-control" placeholder="Realisasi" required="">
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
  <div class="modal fade" id="edit-evaluasi">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="" id="form-edit-evaluasi" method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <div class="modal-title">
                        <h3><b><i class="fa fa-edit"></i> Edit Baseline</b></h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Baseline</label>
                        <div class="col-sm-8">
                            <input type="text" name="baseline" id="baseline" class="form-control" placeholder="Baseline" required="">
                        </div>
                    </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Target</label>
                        <div class="col-sm-8">
                            <input type="text" name="target" id="target" class="form-control" placeholder="Target" required="">
                        </div>
                    </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Realisasi</label>
                        <div class="col-sm-8">
                            <input type="text" name="realisasi" id="realisasi" class="form-control" placeholder="Realisasi" required="">
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
@stop

@section('js')
  @include('plugins.alertify-js')
    <script>
      function deleteevaluasi(id,evaluasi) {
        alertify.confirm("Konfirmasi!","Apakah anda yakin menghapus Data Ini "+evaluasi+" ?",function(){
          $('#'+id).submit();
        },function(){

        })
      }
      function editevaluasi(id)
      {
         $.ajax({
            url:baseURL()+"/admin/evaluasi-kinerja/"+id+"/edit",
            type:'get',
            success:function(data)
            {
                $('#edit-evaluasi').modal('show');
                var url=baseURL()+"/admin/evaluasi-kinerja/"+id;
                $('#form-edit-evaluasi').attr('action',url);
                $('#baseline').val(data.baseline);
                $('#target').val(data.target);
                $('#realisasi').val(data.realisasi);        
            }
        });
      }
    </script>
@stop