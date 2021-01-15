<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/custom-bootstrap.css') }}"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    @endif

    @yield('adminlte_css')
    <style type="text/css">
      #overlay{ 
        position: fixed;
        top: 0;
        z-index: 100;
        width: 100%;
        height:100%;
        display: none;
        background: rgba(0,0,0,0.6);
      }
     
      .cv-spinner::before{ 
        position: absolute;
        top: 55%;
        
        font-size: 17px;
        text-align: center !important;
        font-weight: bold;
          color: navy;
          content: "Sedang Proses, Harap tunggu dan browser jangan ditutup ";
      }
      .cv-spinner {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;  
      }
      .spinner {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
      }
      @keyframes sp-anime {
        100% { 
          transform: rotate(360deg); 
        }
      }
      .is-hide{
        display:none;
      }
      .combodate > select {
        width: 220px;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        height: 30px;
        margin-top: 4px;
        line-height: 30px;

        }
     .combodate > select.month,select.year {
        margin-left: 20px;

      }
      .combodate > select.day {
        min-width:50px !important;

      }
      .combodate > select.year {
        min-width:100px !important;

      }
     
   
  
    </style>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @include('plugins.datepicker-css')
    <input type="hidden" name="root" id="root" value="{{url('/')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div id="overlay">
    <div class="cv-spinner">
      <span class="spinner"></span>
    </div>
</div>
<body class="hold-transition @yield('body_class') ">


@yield('body')

<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
    function baseURL() {
        return $("#root").val();
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="{{asset('js/select2.js')}}">
        
    </script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <script src="{{asset('js/datatables.js')}}"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.file.min.js')}}"></script>
<script type="text/javascript">
  $.validator.addMethod('filesize', function (value, element, param) {
    
        return this.optional(element) || (element.files[0].size <= param)
      });
      $.validator.addMethod('extensi', function (value, element, param) {
        
        return this.optional(element) || (element.files[0].type <= param)
    });
</script>
@include('plugins.combodate-js')
@yield('adminlte_js')
<script type="text/javascript">
  $(".select2ajaxpegawai").select2({
      placeholder:"Semua",
      allowClear:true,
      ajax:{
          url:"{{url('admin/load-dosen-pegawai')}}",
          dataTyper:"json",
          data:function(param)
          {
              var value= {
                  search:param.term,
              };
              return value;
          },
          processResults:function(hasil)
          {
              return {
                  results:hasil,
              };
          }
      }
    });
</script>


</body>
</html>
