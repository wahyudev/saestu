@extends('front-page.master')
@section('judul')
	Login Daftar Ulang
@stop
@section('css-tambahan')
	<style type="text/css">
		.comment-form {
    border-top: 0;
    padding-top: 0px;
    margin-top: 0px;
    margin-bottom: 20px;
}
	</style>	
	@include('plugins.alertify-css')
@stop
@section('body')
<section class="blog_area single-post-area section_padding">
  <div class="container">
     <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-lg-12 posts-list">
           
        
            <div class="blog_right_sidebar">
              <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title" style="margin-bottom: 0px;">Reset Password</h4>

                <p>
                  Kami sudah mengirim Link Konfirmasi Reset Akun Ke email anda, silahkan cek Kotak Masuk / Inbox email anda
                </p>
                
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

