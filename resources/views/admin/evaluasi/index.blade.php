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
              <select class="form-control" name="tahun_filter" id="tahun_filter" onchange="load_data()">
                @for($i=date('Y'); $i >= date('Y')-5; $i-- )
                <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
            <div class="form-group col-lg-4">
              <label>Unit Kerja</label>
              <select class="form-control" name="pejabat" id="pejabat" onchange="load_data()">
                
                @foreach($pejabat as $unit)
                <option value="{{$unit->unit_kerja_id.';'.$unit->jabatan_id}}">{{Helpers::pejabat($unit)}}</option>
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
                  <th>Bertanggung Jawab Ke</th>
                  <th>Diperoleh Dari</th>
                  <th>Baseline</th>
                  <th>Target</th>
                  <th>Realisasi</th>
                  <th>Bobot</th>
                  <th>Skor</th>
                  <th>Nilai IKU</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              
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
                        <label class="control-label col-sm-3">Indikator Kinerja</label>
                        <div class="col-sm-8">
                            <select name="id_ik" id="id_ik" class="form-control select2" required="" style="width: 100%">
                              <option value="">Pilih Indikator Kinerja</option>
                              @foreach(App\IndikatorKinerja::get() as $j )
                              <option value="{{$j->id_ik}}">{{'[ '.$j->kode_iku.'] '.$j->nama_ik}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Pejabat</label>
                        <div class="col-sm-8">
                            <select name="id_unit_kerja_jabatan" id="id_unit_kerja_jabatan" class="form-control select2" required=""  style="width: 100%">
                              <option value="">Pilih pejabat</option>
                              @foreach(App\UnitKerjaJabatan::join('kepeg.jabatan as a','a.id_jabatan','=','kepeg.unit_kerja_jabatan.jabatan_id')->orderBy('a.urutan')->whereIn('jenis_jabatan_id',[1,5])->get() as $j )
                              <option value="{{$j->id_unit_kerja_jabatan}}">{{$j->nama_jabatan.' '.$j->unit_kerja->ref_unit->nama_di_plo}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Melapor Ke </label>
                        <div class="col-sm-8">
                            <select name="id_unit_kerja_jabatan_atasan" id="id_unit_kerja_jabatan_atasan" class="form-control select2"  style="width: 100%">
                              
                              <option value="0">Tidak Perlu Melapor</option>
                              @foreach(App\UnitKerjaJabatan::join('kepeg.jabatan as a','a.id_jabatan','=','kepeg.unit_kerja_jabatan.jabatan_id')->orderBy('a.urutan')->whereIn('jenis_jabatan_id',[1,5])->get() as $j )
                              <option value="{{$j->id_unit_kerja_jabatan}}">{{$j->nama_jabatan.' '.$j->unit_kerja->ref_unit->nama_di_plo}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tahun</label>
                        <div class="col-sm-8">
                            <input type="text" name="tahun" id="tahun" class="form-control" placeholder="Tahun" required="">
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
      $(".select2").select2();
      function tambah()
      {
        $('#modal').modal('show');
        $('#method').html("");
        var url=baseURL()+"/admin/evaluasi-kinerja";
        $('#modal-form').attr('action',url);
        $('#judul').html("<i class='fa fa-plus'></i> Tambah Evaluasi Kinerja Pada Pejabat");
        
        $('#id_ik').val("").trigger('change');
        $('#id_unit_kerja_jabatan').val("").trigger('change');
        $('#id_unit_kerja_jabatan_atasan').val("").trigger('change');
        
        $('#tahun').val("{{date('Y')}}");
        
        
      }
      function confirmation(id,nama) {
        alertify.confirm("Konfirmasi!","Apakah anda yakin menghapus indikator kinerja "+nama+" ?",function(){
          $('#'+id).submit();
        },function(){

        })
      }
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
                var url=baseURL()+"/admin/evaluasi-kinerja/"+id;
                $('#modal-form').attr('action',url);
                $('#id_ik').val(data.id_ik);
                $('#id_jabatan').val(data.id_jabatan);
                $('#tahun').val(data.tahun);
              
                        
            }
        });
      }
      load_data();
      function load_data() {
        var table=$('#table').DataTable( {
          bAutoWidth: false,
          bLengthChange: true,
          iDisplayLength: 10,
          searching: true,
          processing: true,
          serverSide: true,
          bDestroy: true,
          bStateSave: true,
          ajax: {
            url:'{{url('admin/evaluasi-kinerja')}}',
            data:{
              tahun:$("#tahun_filter").val(),
              pejabat:$("#pejabat").val(),
            },
          },
          columns: [
                {data: 'DT_RowIndex',orderable:false,searchable:false},
                
                {data: 'nama_indikator',name:'nama_indikator',orderable:false,searchable:false},
                {data: 'bertanggungjawab_ke',name:'bertanggungjawab_ke',orderable:false,searchable:false},
                {data: 'diperoleh_dari',name:'diperoleh_dari',orderable:false,searchable:false},

                {data: 'baseline', name: 'baseline'},
                {data: 'target', name: 'target'},
                {data: 'bobot', name: 'bobot'},
                {data: 'skor', name: 'skor'},
                {data: 'nilai_iku', name: 'nilai_iku'},
                {data: 'action',name:'action',orderable:false,searchable:false},
                
            ],
          aLengthMenu: [[10, 15, 25, 35, 50, 100, -1], [10, 15, 25, 35, 50, 100, "All"]], 
          responsive: !0
        });
      }
    </script>
@stop