<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>IKU UNIVERSITAS JAMBI</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('smart-opl/assets/images/favicon.png') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('smart-opl/assets/css/bootstrap.min.css') }}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ asset('smart-opl/assets/css/LineIcons.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('smart-opl/assets/css/magnific-popup.css') }}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('smart-opl/assets/css/slick.css') }}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('smart-opl/assets/css/animate.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('smart-opl/assets/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('smart-opl/assets/css/style.css') }}">


</head>

<body>
        <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->

    <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('smart-opl/assets/images/logo.png') }}" alt="Logo" height="70px" width="70px">
                            </a>
                               
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        <div id="home" class="slider-area">
            <div class="bd-example">
                <div id="carouselOne" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item bg_cover active" style="background-image: url('{{asset('smart-opl/assets/images/slider-1.jpg')}}')">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-15 col-lg-15 col-sm-15">
                                            <h2 class="carousel-title">SELAMAT DATANG DI DASHBOARD INDIKATOR KINERJA UTAMA UNIVERSITAS JAMBI</h2>
                                            <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-one" href="{{url('rangking')}}">BUKA IKU</a></li>
                                                <li><a class="main-btn rounded-one" href="{{url('login')}}">LOGIN</a></li>
                                            </ul>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                </div> <!-- carousel -->
            </div> <!-- bd-example -->
        </div>
    </section>
    <!--====== jquery js ======-->
    <script src="{{ asset('smart-opl/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('smart-opl/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('smart-opl/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('smart-opl/assets/js/popper.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('smart-opl/assets/js/slick.min.js') }}"></script>

    <!--====== Isotope js ======-->
    <script src="{{ asset('smart-opl/assets/js/isotope.pkgd.min.js') }}"></script>

    <!--====== Images Loaded js ======-->
    <script src="{{ asset('smart-opl/assets/js/imagesloaded.pkgd.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('smart-opl/assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Scrolling js ======-->
    <script src="{{ asset('smart-opl/assets/js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('smart-opl/assets/js/jquery.easing.min.js') }}"></script>

    <!--====== wow js ======-->
    <script src="{{ asset('smart-opl/assets/js/wow.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('smart-opl/assets/js/main.js') }}"></script>

</body>

</html>
