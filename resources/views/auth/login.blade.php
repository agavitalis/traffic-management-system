<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Traffic Safety| </title>

     <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
     <link href="{{asset('css/custom.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
     
            <div class="row">
                <!-- Current avatar -->
                <div class="col col-md-12 col-sm-12 col-xs-12">
                <img class="img-responsive login-img " src="../images/picture.jpg" alt="Avatar" title="Change the avatar">
                </div>
            </div>

      <div class="login_wrapper">

        
        <div class="animate form login_form col-md-12 col-sm-12 col-xs-12">
          <section class="login_content">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
              <h1>Login to the Platform</h1>
              <div>
                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
              </div>
              <div>
                <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              </div>
              <div>
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
              </div>
              <div>
                
                                   
                </button> <button type="submit" class="btn btn-primary">
                    Login
                </button>
                <a class="reset_pass" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                 <div>
                  <h1><i class="fa fa-ambulance"></i>Traffic Safety</h1>
                  <p>©<?php echo date('Y'); ?> All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
