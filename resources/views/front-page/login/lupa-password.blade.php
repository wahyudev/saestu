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
                  Untik melakukan reset password, pastikan anda sudah pernah <b>Login </b> sebelumnya dan memasukan alamat <b>email yang aktif anda gunakan</b>, kami akan mengirim informasi akun ke email yang sudah pernah anda masukan
                </p>
                <form class="" action="{{url('lupa-password')}}" id="commentForm" method="post" style="margin-top: 10px;">
                   @csrf
                   <div class="row">
                      <div class="col-12">
                         <div class="form-group">
                            <input class="form-control" name="email" id="email" type="text" placeholder="Masukan alamat email">
                            <small>contoh : alamatemailanda@gmail.com</small>
                         </div>
                      </div>
                      

                      @if(Session::has('alert'))
                      <div class="col-12">
                        <b style="color: white; background-color:red; padding: 5px 5px 5px 5px;" >{{Session::get('alert')}}</b>
                      </div>
                      @endif
                      
                   </div>
                   <div class="form-group">
                    <br>
                      <button type="submit" class="button btn_1 button-contactForm">Proses Reset Password</button>
                   </div>
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

