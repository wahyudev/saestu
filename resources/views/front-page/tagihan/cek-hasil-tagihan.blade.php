@extends('front-page.master')
@section('judul')
	Tagihan
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')

	<!-- Services section -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
			<a href="{{url('cek-tagihan')}}"><span>Tagihan</span></a> 
		</div>
	</div>
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					@if(!$data)
					<div class='alert alert-warning'>
						Maaf ID tagihan <b>{{$id_tagihan}}</b> tidak ditemukan!
					</div>
					@else
					
							
							<div class='alert'>
								<p>Rincian tagihan seleksi penerimaan mahasiswa baru jalur {{$data->data_pendaftar->buka_pendaftaran->jalur_masuk->nama_jalur_masuk." ".$data->data_pendaftar->buka_pendaftaran->kelompok_ujian->nama_kelompok_ujian_singkat}}:</p>
								<table width="100%">
									<tr valign="top">
										<td width="40%">ID Tagihan</td><td width="2%">:</td><td>{{$data->id_tagihan}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Username Login</td><td width="2%">:</td><td>{{$data->username}}</td>
									</tr>
									@if($data->password_teks!=null)
									<tr valign="top">
										<td width="40%">Password Login</td><td width="2%">:</td><td>{{$data->password_teks}}</td>
									</tr>
									@endif
									<tr valign="top">
										<td width="40%">Nama Pendaftar</td><td width="2%">:</td><td>{{$data->biodata->nama_peserta}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Tanggal Lahir</td><td width="2%">:</td><td>{{Tanggal::tgl_indo($data->biodata->tanggal_lahir)}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Email</td><td width="2%">:</td><td>{{$data->biodata->email}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Tanggal Daftar</td><td width="2%">:</td><td>{{Tanggal::time_indo($data->created_at)}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Jalur Pendafataran</td><td width="2%">:</td><td>{{$data->data_pendaftar->buka_pendaftaran->jalur_masuk->nama_jalur_masuk}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Kelompok Ujian</td><td width="2%">:</td><td>{{$data->data_pendaftar->buka_pendaftaran->kelompok_ujian->nama_kelompok_ujian_singkat}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Jumlah Bayar</td><td width="2%">:</td><td>{{Uang::format_uang($data->data_pendaftar->buka_pendaftaran->biaya_pendaftaran)}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Batas Pembayaran</td><td width="2%">:</td><td>{{Tanggal::time_indo($data->batas_akhir_pembayaran)}}</td>
									</tr>
									@if($data->pembayaran==1)
									<tr valign="top">
										<td width="40%">Status Pembayaran</td><td width="2%">:</td><td><span class="label label-success"><b>Sudah dibayar</b></span></td>
									</tr>
									<tr valign="top">
										<td width="40%">Waktu Pembayaran</td><td width="2%">:</td><td>{{Tanggal::time_indo($tagihan->waktu_bayar)}}</td>
									</tr>
									<tr valign="top">
										<td width="40%">Bank</td><td width="2%">:</td><td>{{$tagihan->bank}}</td>
									</tr>
									@else
									<tr valign="top">
										<td width="40%">Status Pembayaran</td><td width="2%">:</td><td><span class="label label-danger"><b>Belum dibayar</b></span></td>
									</tr>
									@endif
								</table>
								
							</div>
							

					@endif
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Info Sebelumnya</h5>
						<div class="recent-post-widget">
							<!-- recent post -->
							@foreach($info as $data)
							<div class="rp-item">
								<div class="rp-content" style="padding-left: 0px;">
									<a href="{{url('info-pendaftaran/'.$data->id_info_pendaftaran)}}"><h6>{{$data->judul}}</h6></a>
									<p><i class="fa fa-clock-o"></i> {{Tanggal::time_indo($data->created_at)}}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<!-- widget -->
					
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->
	

@stop
@section('js-tambahan')
	@include('plugins.alertify-js')
	<script type="text/javascript">
		
	</script>
@stop

