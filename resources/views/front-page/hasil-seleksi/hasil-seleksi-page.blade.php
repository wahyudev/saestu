@extends('front-page.master')
@section('judul')
	Hasil Seleksi
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')

<section class="blog_area single-post-area section_padding">
	<div class="container">
		<div class="row">

			<div class="col-lg-12">
				<h2>Cek Kelulusan</h2>
				<h5>Gunakan Nomor tes yang anda gunakan pada jalur penerimaan sebelumnya (SNMPTN, SBMPTN, SMMPTN, Seleksi Mandiri Vokasi, Seleksi Mandiri Pasca, Profesi Insinyur, Hafiz dll) tanpa karakter khusus
				</h5>
				<ul>
					<li>1. Gunakan nomor tes yang digunakan pada seleksi penerima jalur Mandiri Vokasi/SNMPTN/SBMPTN/HAFIZ/SMMPTN/Pascasarjana/Profesi Insinyur dll </li>
					<li>2. Masukan nomor tes tanpa karakater/simbol khusus (hanya angka saja) contoh nomor tes 020-00001 -> menjadi 02000001 atau 20-151-10-12345 menjadi 201511012345</li>
				</ul>
				
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget search_widget">
						<form action="{{url('cek-kelulusan')}}" method="post">
							@csrf
							<div class="form-group">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="no_test" placeholder="Nomor pendaftaran/nomor tes/nomor peserta ujian" onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''" onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nomor pendaftaran/nomor tes/nomor peserta ujian'">
									<div class="input-group-append">
										<button class="btn" type="button"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group mb-3">
									<div class="form-style-agile">
        
					          <div class="g-recaptcha" data-sitekey="6LdVEfIUAAAAAOpol10t7v14RWjD18cpD8ZJbeJe"></div>
					                  
					      	</div>	
								</div>	
							</div>
							<button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">SUBMIT</button>
						</form>
					</aside>
					
				</div>
			</div>
		</div>
	</div>
</section>
	

@stop
@section('js-tambahan')
	@include('plugins.alertify-js')
	<script type="text/javascript">
		
	</script>
@stop

