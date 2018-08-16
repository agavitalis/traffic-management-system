<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-FEES Platform | </title>

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
    
      <div class="register_wrapper">

        <section class="login_content"> 
          <div class="col-md-12 register-header"><h1>Register on E-FEES Platform</h1></div>
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            <div class="animate col-md-6">

                  {{ csrf_field() }}
                  <div>
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>

                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div>
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus>

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div>
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                  </div>
                  
            </div>

             <div class="animate col-md-6">

                  {{ csrf_field() }}
                  <div>
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"placeholder="Confirm Password" required>
              
                  </div>

                  <div>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> I accept the terms and conditions                    </label>
                  </div>
                  <div>
                    
                                      
                    </button> <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                    <a class="reset_pass" href="{{ route('login') }}">
                        already have an acount? Login here
                    </a>
                  </div>
                  
            </div>
             <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                 <div>
                  <h1><i class="fa fa-money"></i>   E-FEES PLATFORM</h1>
                  <p>©<?php echo date('Y'); ?> All Rights Reserved.</p>
                </div>
              </div>
          </form>  
         
        </section>
      
      </div>

  </body>
</html>
