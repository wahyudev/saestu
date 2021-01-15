@extends('front-page.master')
@section('judul')
	Cek Tagihan
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')

	<!-- Services section -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
			<a href="{{url('cek-tagihan')}}"><span>Cek Tagihan</span></a> 
		</div>
	</div>
<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="contact-form spad pb-0">
						<div class="section-title text-center">
							<h3>Cek Tagihan Pembayaran Uang Pendaftaran</h3>
							<p>Masukan ID Tagihan yang anda peroleh setelah mengisi formulir pendaftaran</p>
						</div>
						<form class="comment-form --contact" action="{{url('cek-tagihan')}}" method="post">
							@csrf
							<div class="row">
								<div class="col-lg-12">
									<input type="text" name="id_tagihan" placeholder="Masukan Nomor ID Tagihan">
									<i style="font-size: 11px">Contoh : 1911123456</i>
									<div class="text-center">
										<button class="site-btn">CEK TAGIHAN</button>
									</div>
								</div>
								
							</div>
						</form>
					</div>
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
	</section>
	<!-- Services section end -->
	

@stop
@section('js-tambahan')
	@include('plugins.alertify-js')
	<script type="text/javascript">
		
	</script>
@stop

