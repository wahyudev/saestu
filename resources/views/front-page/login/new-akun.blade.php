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
                  Reset password berhasil, Kami juga sudah mengirim Informasi Konfirmasi  Akun Ke email anda, silahkan cek Kotak Masuk / Inbox email anda
                </p>
                
                  <table class="table" width="100%">
                    
                    <tr>
                      <td width="35%">Nomor Tes (username login)</td><td width="2%">:</td><td>{{$cek->no_test}}</td>
                    </tr>
                    <tr>
                       
                      <td width="35%">Password Baru</td><td width="2%">:</td><td>30111996</td>
                    </tr>
                    <tr>
                      <td width="35%">Nama </td><td width="2%">:</td><td>{{$cek->nama_mahasiswa}}</td>
                    </tr>


                    
                    
                    <tr>
                      <td width="35%">Prodi Lulus</td><td width="2%">:</td><td>{{$cek->prodi_lulus->jenjang_pendidikan->nama_jenjang_pendidikan.' '.$cek->prodi_lulus->nama_prodi}}</td>
                    </tr>
                    <tr>
                      <td width="35%">Angkatan</td><td width="2%">:</td><td>{{$cek->angkatan}}</td>
                    </tr>
                    

                  </table>
                         
                
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

