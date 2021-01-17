<form  id="form-data">
	@csrf
	<input type="hidden" name="id_unit_kerja" value="{{$unit_jabatan->unit_kerja_id}}">
	<input type="hidden" name="id_jabatan" value="{{$unit_jabatan->jabatan_id}}">
	<input type="hidden" name="tahun" value="{{$tahun}}">
	<table class="table">
		<tr>
			<td>No</td><td><input type="checkbox" class="cekall" class="checkbox"></td><td>Nama Indikator</td><td width="20%">Mnyerahkan Data Ke</td><td width="20%">Memperoleh data dari</td><td>#</td>
		</tr>
		@foreach($indikator as $d)
		<tr>
			<td width="2%">{{$loop->iteration}}</td>
			<td>
				<input type="checkbox" class="pilih" name="id_ik[]" value="{{$d->id_ik}}" {{in_array($d->id_ik,$jabatan_indikator) ? 'checked':''}}></td>
				
			<td>{{$d->nama_ik}}</td>
			<td>
				@if(in_array($d->id_ik,$jabatan_indikator))
					@php
						$ek=App\EvaluasiKinerja::where('id_ik',$d->id_ik)->where('id_unit_kerja',$unit_jabatan->unit_kerja_id)->where('id_jabatan',$unit_jabatan->jabatan_id)->where('tahun',$tahun)->first();

					@endphp
					@if(count($ek->parent) > 0)
						<ul>
							@foreach($ek->parent as $a)
							<li>{{Helpers::pejabat($a)}}</li>
							@endforeach
						</ul>
					@else
					Tidak ada
					@endif
				@endif
			</td>
			<td>
				@if(in_array($d->id_ik,$jabatan_indikator))
					@if(count($ek->child) > 0)
						<ul>
							@foreach($ek->child as $a)
							<li>{{Helpers::pejabat($a)}}</li>
							@endforeach
						</ul>
					@else
					Tidak ada
					@endif
				@endif
			</td>
			<td>
				@if(in_array($d->id_ik,$jabatan_indikator))
				<button type="button" class="btn btn-primary" onclick="set_parent('{{$d->id_ik}}','{{$tahun}}','{{$ek->id_unit_kerja}}','{{$ek->id_jabatan}}')">Set Parent</button>
		        @endif
			</td>
		</tr>	
				
		@endforeach
		<tr >
			<td colspan="4">
				<button type="button" class="btn btn-primary" onclick="simpan()"> Simpan</button>
			</td>
		</tr>
	</table>
</form>
<div class="modal fade" id="modal-parent">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <div id="method"></div>
            <div class="modal-header">
                <div class="modal-title">
                    <h3 id="judul">Set Parent</h3>
                </div>
            </div>
            <div class="modal-body">
            	<form id="form-parent" class="form-horizontal">
	                <input type="hidden" name="id_ik" id="id_ik">
	                <input type="hidden" name="tahun" id="tahun">
	                <input type="hidden" name="id_unit_kerja_ek" id="id_unit_kerja_ek">
	                <input type="hidden" name="id_jabatan_ek" id="id_jabatan_ek">
	                <div class="form-group">
	                    <label class="control-label col-sm-3">Melapor Ke </label>
	                    <div class="col-sm-8">
	                        <select name="id_unit_kerja_jabatan_atasan[]" id="id_unit_kerja_jabatan_atasan" class="form-control select2" multiple=""  style="width: 100%">
	                          
	                          
	                          @foreach($unit_jabatan_atasan as $j )
	                          <option value="{{$j->id_unit_kerja_jabatan}}">{{$j->nama_jabatan.' '.$j->unit_kerja->ref_unit->nama_di_plo}}</option>
	                          @endforeach
	                        </select>
	                    </div>
	                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                <button  class="btn btn-sm btn-info"  data-dismiss="modal" onclick="simpan_parent()" type="button"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
            </div>
            
        </div>
    </div>
  </div>
<script type="text/javascript">
	$(".cekall").click(function () { // Jika Checkbox Pilih Semua di ceklis maka semua sub checkbox akan diceklis juga
        $(".pilih").attr('checked', this.checked);
      });
	$(".select2").select2();
	function simpan()
	{
		alertify.confirm("Konfirmasi",'yakin simpan data',function(){
			$.ajax({
				url:"{{url('admin/store-setup-jabatan-indikator')}}",
				type:'post',
				data:$("#form-data").serialize(),
				beforeSend:function()
				{
					$("#html-iku").html("sedang menyimpan..");
				},success:function(data){
					alertify.success('Berhasil simpan data');
					load_data();
				}

			})
		},function(){});
	}
	function set_parent(id_ik,tahun,id_unit_kerja_ek,id_jabatan_ek)
	{
		$('#modal-parent').modal('show');
       
        $('#id_ik').val(id_ik);
        $('#tahun').val(tahun);
        $('#id_unit_kerja_ek').val(id_unit_kerja_ek);
        $('#id_jabatan_ek').val(id_jabatan_ek);
      

	}
	function simpan_parent()
	{
		
		$.ajax({
			url:"{{url('admin/store-setup-jabatan-indikator-simpan-parent')}}",
			type:'post',
			data:$("#form-parent").serialize(),
			beforeSend:function()
			{
				$("#html-iku").html("sedang menyimpan..");
			},success:function(data){
				
				if (data.result==0) {
					alertify.error(data.pesan);
				}else
				{
					alertify.success(data.pesan);
				}
				$('#modal-parent').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				load_data();
			}

		})
		
	}
</script>