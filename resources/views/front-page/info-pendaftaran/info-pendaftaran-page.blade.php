@extends('front-page.master')
@section('judul')
	Info Pendaftaran
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')

	<!-- Services section -->
	<section class="blog_area section_padding">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 mb-9 mb-lg-0">
                  <div class="blog_left_sidebar">
                      @foreach($datas as $data)
                      <article class="blog_item" style="margin-bottom: 10px !important;">
                          

                          <div class="blog_details" style="box-shadow: 0px 10px 20px 0px rgba(130, 115, 115, 0.56);">
                              <a class="d-inline-block" href="{{url('informasi-daftar-ulang/'.$data->id_info_pendaftaran)}}">
                                  <h2>{{$data->judul}}</h2>
                                  <h4>{{Tanggal::time_indo($data->created_at)}}</h4>
                              </a>
                              
                          </div>
                      </article>
                      @endforeach

                      

                      <nav class="blog-pagination justify-content-center d-flex">
                          <ul class="pagination">
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Previous">
                                      <i class="ti-angle-left"></i>
                                  </a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link">1</a>
                              </li>
                              <li class="page-item active">
                                  <a href="#" class="page-link">2</a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Next">
                                      <i class="ti-angle-right"></i>
                                  </a>
                              </li>
                          </ul>
                      </nav>
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

