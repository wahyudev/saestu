@extends('front-page.master')
@section('judul')
	Info Pendaftaran
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
  <style type="text/css">
    ol {
      color: #666666;
      font-family: "Roboto", sans-serif;
      line-height: 1.929;
      font-size: 14px;
      margin-bottom: 0px;
      color: #888888;
    }
  </style>
@stop
@section('body')

	<!-- Services section -->
	<section class="blog_area single-post-area section_padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                
                <div class="blog_details">
                   <h2>{{$detail->judul}}
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> {{Helpers::nama_gelar($detail->user->pegawai)}}</a></li>
                      <li><a href="#"><i class="far fa-clock"></i> {{Tanggal::time_indo($detail->created_at)}}</a></li>
                      <li><a href="#"><i class="far fa-eye"></i> Dilihat {{$detail->dilihat}} kali</a></li>
                   </ul>
                   {!!$detail->isi!!}
                </div>
             </div>
             
          </div>
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                
                <aside class="single_sidebar_widget popular_post_widget">
                   <h3 class="widget_title">Informasi Lainnya</h3>
                   @foreach($datas as $data)
                   <div class="media post_item">
                      {{-- <img src="{{url('img/article.png')}}" alt="post st"> --}}
                      <div class="media-body">
                         <a href="{{url('informasi-daftar-ulang/'.$data->id_info_pendaftaran)}}">
                            <h3>{{$data->judul}}</h3>
                         </a>
                         <p>{{Tanggal::time_indo($data->created_at)}}</p>
                      </div>
                   </div>
                   @endforeach
                  
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

