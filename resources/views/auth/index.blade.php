<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('login2/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('login2/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('login2/css/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login2/css/style.css') }}">

    <title>Login IKU</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{asset('login2/images/asa.png')}}');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>Dashboard</strong></h3>
			<form action="{{url('login')}}" class="login100-form validate-form"  method="post" >
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="NIK/NIP" id="username">
               @if ($errors->has('username'))
                    <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                 </span>
                @endif
              </div>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass"></a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    <script src="{{ asset('login2/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login2/js/popper.min.js') }}"></script>
    <script src="{{ asset('login2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login2/js/main.js') }}"></script>
  </body>
</html>