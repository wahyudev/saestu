@extends('front-page.master')
@section('judul')
	Hasil Seleksi
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')

	<!-- Services section -->
	<section class="blog_area single-post-area section_padding">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">
					<h2>Hasil Cek</h2>
					<h5>Hasil pengecekan kelulusan dengan nomor tes <b>{{$no_test}}</b></h5>
					<div class="blog_right_sidebar">
						<aside class="single_sidebar_widget search_widget">
							@if(!$hasil)
							<div class='alert alert-warning'>
								Maaf nomor tes <b>{{$no_test}}</b> anda masukan tidak ditemukan, pastikan nomor test yang anda masukan adalah benar atau anda tidak lulus pada saat seleksi pada jalur seleksi yang anda tempuh!
							</div>
							@else
						
								<p><b>Selamat!</b> nomor peserta <b>{{$no_test}}</b> dinyatakan <b>LULUS</b> pada seleksi penerimaan mahasiswa baru pada penerimaan jalur <b>{{$hasil->jenis_pendaftaran->nama_jenis_pendaftaran.' '.$hasil->jenis_pendaftaran->keterangan}}</b>, berikut rincian data kelulusan anda:</p>
								<table width="100%">
									<tr valign="top">
										<td width="30%">Nomor Induk Kependudukan (NIK KTP)</td><td width="2%">:</td><td>{{$hasil->nik}}</td>
									</tr>
									<tr valign="top">
										<td >Nomor Tes</td><td width="2%">:</td><td>{{$hasil->no_test}}</td>
									</tr>
									<tr valign="top">
										<td >Nama Peserta</td><td width="2%">:</td><td>{{$hasil->nama_mahasiswa}}</td>
									</tr>
									
									<tr valign="top">
										<td >Jurusan/Program Studi</td><td width="2%">:</td><td>{{$hasil->prodi_lulus->nama_prodi." (".$hasil->prodi_lulus->jenjang_pendidikan->nama_jenjang_pendidikan .") "}}</td>
									</tr>
									
									<tr valign="top">
										<td >Status Beasiswa</td>
										<td width="2%">:</td>
										<td>
											@if($hasil->beasiswa)
											Tedaftar sebagai calon penerima beasiswa {{$hasil->beasiswa->nama_beasiswa}}
											@else
												Tidak terdaftar sebagai calon penerima beasiswa
											@endif
										</td>
									</tr>
									<tr valign="top">
										<td >Angkatan</td><td width="2%">:</td><td>{{$hasil->angkatan}}</td>
									</tr>
									
								</table>
								<center style='margin-top: 30px;'><i>Segera lakukan pendaftaran ulang pada pada sistem ini dengan klik <a href="{{url('login')}}" class="btn btn-primary btn-sm" style="color: white !important;">Login daftar ulang</a></center>
							
							@endif
						</aside>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	{{-- <section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					@if(!$hasil)
					<div class='alert alert-warning'>
						Maaf nomor peserta <b>{{$no_tes}}</b> tidak ditemukan!
					</div>
					@else
						@if($hasil->buka_pendaftaran->umumkan==0)
							<div class='alert alert-info'>
								Maaf! pengumuman kelulusan belum di buka silahkan cek di kemudian hari atau pantau terus infomasi di web ini
							</div>
						@else
							@if($hasil->status=='menunggu')
							<div class='alert alert-info'>
								Maaf! nomor peserta tes <b>{{$no_tes}}</b>  masih dalam tahap pemeriksaan, silahkan cek lagi nanti
							</div>
							@elseif($hasil->status=='lulus')
							<div class='alert alert-success'>
								<p><b>Selamat!</b> nomor peserta <b>{{$no_tes}}</b> dinyatakan <b>LULUS</b> pada seleksi penerimaan mahasiswa baru pada penerimaan jalur {{$hasil->buka_pendaftaran->jalur_masuk->nama_jalur_masuk." ".$hasil->buka_pendaftaran->gelombang->nama_gelombang}}, berikut rincian data kelulusan anda:</p>
								<table width="100%">
									<tr valign="top">
										<td width="20%">Nomor Tes</td><td width="2%">:</td><td>{{$hasil->no_tes}}</td>
									</tr>
									<tr valign="top">
										<td width="20%">Nama Peserta</td><td width="2%">:</td><td>{{$hasil->user->biodata->nama_peserta}}</td>
									</tr>
									<tr valign="top">
										<td width="20%">TTL</td><td width="2%">:</td><td>{{$hasil->user->biodata->tempat_lahir." / ".Tanggal::tgl_indo($hasil->user->biodata->tanggal_lahir)}}</td>
									</tr>
									<tr valign="top">
										<td width="20%">Alamat</td><td width="2%">:</td><td>{{$hasil->user->biodata->alamat_lengkap.", ".$hasil->user->biodata->kabupaten->nama_kabupaten .", ".$hasil->user->biodata->provinsi->nama_provinsi}}</td>
									</tr>
									<tr valign="top">
										<td width="20%">Asal SMTA</td><td width="2%">:</td><td>{{$hasil->user->biodata->sekolah->nama_sekolah}}</td>
									</tr>
									<tr valign="top">
										<td width="20%">Lulus Pada</td>
										<td width="2%">:</td><td>Program Studi {{"(".$hasil->prodi_lulus->id_prodi.") ".$hasil->prodi_lulus->nama_prodi." (".$hasil->prodi_lulus->jenjang_pendidikan->nama_jenjang_pendidikan.") ".$hasil->prodi_lulus->fakultas->sebutan." ".$hasil->prodi_lulus->fakultas->nama_fakultas}}</td>
									</tr>
								</table>
								<center style='margin-top: 30px;'><i>Segera lakukan pendaftaran ulang pada Biro Akademik dan Kemahasiswaan Universitas Jambi, Info selengkapnya klik link berikut  <a href="https://pmb.unja.ac.id/info-pendaftaran">Pengumuman hasil seleksi</a> </i></center>
							</div>
							@elseif($hasil->status=='tidak_lulus')
							<div class='alert alert-danger'>
								<p><b>Maaf!</b> nomor peserta <b>{{$no_tes}}</b> dinyatakan <b>GAGAL</b> pada seleksi penerimaan mahasiswa baru pada penerimaan jalur {{$hasil->buka_pendaftaran->jalur_masuk->nama_jalur_masuk." ".$hasil->buka_pendaftaran->gelombang->nama_gelombang}}</p>
								
							</div>
							@endif
						@endif

					@endif
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Info Sebelumnya</h5>
						<div class="recent-post-widget">
							<!-- recent post -->
							@foreach($datas as $data)
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
	</section> --}}
	<!-- Services section end -->
	

@stop
@section('js-tambahan')
	@include('plugins.alertify-js')
	<script type="text/javascript">
		
	</script>
@stop

