@extends('front-page.master')
@section('judul')
	Selamat Datang di Sistem Daftar Ulang Mahasiswa Baru
@stop
@section('css-tambahan')
<style type="text/css">
	
	@media (max-width:629px) {
  	.banner_part::after {
    	display: none;
  	}
	} 
	.banner_part::after {
    
    width: 35%;
  
	}
</style>
@stop
@section('body')
<!-- banner part start-->


<section class="banner_part">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-xl-6">
				<div class="banner_text">
					<div class="banner_text_iner">
						<h5><img src="img/logo3.png" alt="logo" style="margin-top: 100px;"> </a></h5>
						{!!$info->sekilas_unja!!}
                        <a href="{{url('informasi-daftar-ulang')}}" class="btn_2">Lihat Pengumuman Lainnya</a>
            
                        <a href="{{url('login')}}" class="btn_2">Login Daftar Ulang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
 <section class="feature_part" style="margin-bottom:20px;">
        <div class="container">
            <div class="row">
                @foreach($step as $s)
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature" >
                        <div class="single_feature_part" style="min-height: 600px;">
                            <span class="single_feature_icon">{{$loop->iteration}}</span>
                            <h4>{{$s->judul}}</h4>
                            <p style="text-align: justify;">{!!$s->deskripsi!!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>

@stop

