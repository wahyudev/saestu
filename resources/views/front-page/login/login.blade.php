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
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
	</style>	
	@include('plugins.alertify-css')
@stop
@section('body')
<section class="blog_area single-post-area section_padding">
  <div class="container">
     <div class="row">
        <div class="  col-lg-12 col-xs-12 posts-list">
           
        
            
            <div class="blog_right_sidebar">
              <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title" style="margin-bottom: 0px;">Login Sistem Daftar Ulang Online E-Registration</h4>

                <p>
                  <table>
                    <tr>
                      <td valign="top">1.&nbsp;</td>
                      <td>Silahkan  login untuk melakukan tahapan daftar ulang, Untuk panduan penggunaan download disini
                       <a href="{{url('Panduan_eregistration.pdf')}}" download="" style="color: blue"><u>Unduh Panduan (update 10 April 2020)</u></a></td>
                    </tr>
                    <tr>
                      <td valign="top">2.&nbsp;</td>
                      <td>Gunakan nomor tes yang digunakan pada seleksi penerima jalur Mandiri Vokasi/SNMPTN/SBMPTN/HAFIZ/SMMPTN/Pascasarjana/Profesi Insinyur dll</td>
                    </tr>
                    <tr>
                      <td valign="top">3.&nbsp;</td>
                      <td>Masukan nomor tes tanpa karakater/simbol khusus (hanya angka saja) contoh nomor tes 020-00001 -> menjadi 02000001 atau 20-151-10-12345 menjadi 201511012345</td>
                    </tr>
                    
                    <tr>
                      <td valign="top">4.&nbsp;</td>
                      <td>Pada login pertama kali maka anda akan menggunakan tanggal lahir sebagai password</td>
                    </tr>
                    <tr>
                      <td valign="top">5.&nbsp;</td>
                      <td>Jika saat anda memasukan password tanggal lahir ternyata salah, maka silahkan hubungi helpdesk Via Whatsapp di nomor <b>0811-7422-799</b></td>
                    </tr>
                    
                  </table>
                  <div class="alert alert-danger">
                    <p style="text-align: justify;">
                      <b>Mohon kepada calon mahasiswa baru yang datanya diverifikasi tidak valid/terdapat kesalahan seperti salah input data tanggal lahir atau file scan yang tidak dapat dibuka untuk dapat memperbaiki data/mengunggah ulang file sesuai dengan info kesalahan yang ditampilkan!</b>
                    </p>
                  </div>

                </p>
                <br>
                  <div id="tempat-form">
                        
                    <div class="form-group" id="form-input">
                      <label><b>Masukan Username Berupa Nomor Tes</b></label>
                          <div class="col-lg-12">
                            <input class="form-control" id="no_tes" type="text" placeholder="Masukan Username Berupa Nomor Tes">
                          </div>
                    </div>
                  </div>
                  <input type="hidden" name="real_username" id="real_username" >

                  

                  <div class="clearfix"></div>
                  <br>
                  <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="button" id="btn-login" onclick="prosesLogin()">Proses Login</button>

                
                   
                   
                
                      
                   
                      
                   
            
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
    $(document).keypress(function (e) {
      if (e.which == 13) {
        prosesLogin();
      }
    });
		function prosesLogin() {
      
      var tahapan= $("#tahapan").val();
      if ($("#no_tes").length!=0) {
          var no_test= $("#no_tes").val();    
          var password="";
          var tahapan="cek_username";

      }else {
          var no_test= $("#real_username").val();    
          var tahapan="cek_password";
          if ($("#password").length==0 ) {
            
            var password = $("#hari").val()+$("#bulan").val()+$("#tahun").val();
          }else{
            var password =$("#password").val();

          }
          if (password==null||password=="") {
            alertify.alert("Peringatan!","Password tidak boleh kosong!");
            return false;
          }
      }
      if (no_test==null||no_test=="") {
         alertify.alert("Peringatan!","Username tidak boleh kosong!");
        
      }else{

        
        $.ajax({

          url:"{{url('login')}}",
          type:"post",
          data:{
            _token:"{{csrf_token()}}",
            username:no_test,
            tahapan:tahapan,
            password:password,
          },
          beforeSend:function(){
            $("#btn-login").html("Sedang memproses...");
          },
          success:function(result)
          {

              if (result.cek_username=='gagal') {

                alertify.alert("Peringatan!","Username "+result.username+" salah atau tidak ditemukan");
                
                $("#no_tes").val("");
              }else{
                if (result.cek_password=='belum_saatnya') {
                  
                  $( "#form-input" ).fadeOut( "slow", function() {
                    //alert(result.username);
                    $("#real_username").val(result.username);
                    $("#tempat-form").html(result.form_password);
                    
                  });
                }else if(result.cek_password=='ok'){
                  window.location.href=result.redirect;
                }else if(result.cek_password=='gagal')
                {
                  alertify.alert("Peringatan!","Password salah!");
                 
                }else{
                  alert("Ada yang salah");
                }
              }
          }


        }).done(function(){
            $("#btn-login").html("Proses Login");
        });
      }
    }
	</script>
@stop

