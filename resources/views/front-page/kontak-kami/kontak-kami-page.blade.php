@extends('front-page.master')
@section('judul')
	Kontak Kami
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')

	<!-- Services section -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
			<a href="{{url('kontak-kami')}}"><span>Kontak Kami</span></a> 
		</div>
	</div>

	<!-- Services section end -->
	<section class="contact-page spad pt-0">
		<div class="container">
			<div class="map-section">
				<div class="contact-info-warp">
					<div class="contact-info">
						<h4>Alamat</h4>
						<p>{{$konten->alamat_pt}}</p>
					</div>
					<div class="contact-info">
						<h4>Telepon</h4>
						<p>{{$konten->telepon_pt}}</p>
					</div>
					<div class="contact-info">
						<h4>Email</h4>
						<p>{{$konten->email_pt}}</p>
					</div>
					<div class="contact-info">
						<h4>Jam Kerja</h4>
						<p>{{$konten->jam_kerja_pt}}</p>
					</div>
				</div>
				<!-- Google map -->
				<div class="map" id="map-canvas">
					 <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=universitas%20jambi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net"></a></div>
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

