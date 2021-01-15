<!DOCTYPE html>
<html lang="en">
  <head>
    <title>
      @yield('judul')
    </title>
    <meta charset="UTF-8">
    <meta name="description" content="Sistem Registrasi Online Calon Mahasiswa Baru">
    <meta name="keywords" content="registrasi, unja, daftar ulang, universitas jambi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->   
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
      @include('plugins.default-front-css')
      @yield('css-tambahan')



  </head>
  <body>
   

    <!-- header section -->

     <header class="main_menu  home_menu menu_fixed animated fadeInDown">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                         
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                @foreach($front_menus as $front)
                                <li class="nav-item " >
                                    <a class="nav-link" {{ request()->is($front->url) ? "style=color:red;" : "" }} href="{{url($front->url)}}" >{{$front->nama_menu}}</a>
                                </li>
                                
                                
                                @endforeach
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end-->

    @yield('body')

    <!-- Footer section -->
    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                
                <div class="col-sm-6">
                    <div class="single-footer-widget footer_2">
                        <h4 class="fw-title">USEFUL LINK</h4>
                        <div class="dobule-link">
                          <ul>
                            <li><a href="https://www.unja.ac.id">Web Universitas Jambi</a></li>
                            <li><a href="https://www.siakad.unja.ac.id">Sistem Informasi Akademik</a></li>
                            <li><a href="https://www.elista.unja.ac.id">ELISTA</a></li>
                            <li><a href="https://www.simlppm.unja.ac.id">SIMLPPM</a></li>
                            <li><a href="https://www.simawa.unja.ac.id">Sistem Informasi Kemahasiswaan</a></li>
                          </ul>
                      
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="single-footer-widget footer_2">
                        <h4>Kontak Kami</h4>
                        <div class="contact_info">
                            <p><span> Alamat :</span> {{$konten->alamat_pt}} </p>
                            <p><span> Telepon :</span> {{$konten->telepon_pt}}</p>
                            <p><span> Email : </span>{{$konten->email_pt}} </p>
                            <p><span> Jam Kerja : </span>{{$konten->jam_kerja_pt}} </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Sistem dikembangkan oleh <a href="https://lptik.unja.ac.id" target="_blank">LPTIK</a> Universitas Jambi  <script>document.write(new Date().getFullYear());</script> | This template is made  by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--====== Javascripts & Jquery ======-->
    @include('plugins.default-front-js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @yield('js-tambahan')
    
  </body>
</html>