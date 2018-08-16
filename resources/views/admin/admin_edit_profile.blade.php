
@extends('layouts.app')

@section('header')
@include('partials.admin.header')
@endsection

@section('body')

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
                <div class="page-title">
                <div class="title_left">
                    <h3>My Profile</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                    </div>
                </div>
                </div>
             <div class="clearfix"></div>
              @include('partials.user.alert')

            
           <div class="register_wrapper">

            <section class="login_content"> 
            <div class="col-md-12 "><h1>Update your Traffic Safety  Profile</h1></div>
             <form class="form-horizontal" method="POST" action="{{ route('admin_edit_profile') }}">
                <div class="animate col-md-4">

                    {{ csrf_field() }}
                    <div>
                        <input id="f_name" type="text" class="form-control" name="f_name" value = "{{Auth::user()->first_name}}" placeholder="First Name" required autofocus>
                        
                    </div>
                     <div>
                        <input id="s_name" type="text" class="form-control" name="s_name"  value = "{{Auth::user()->last_name}}" placeholder="Last Name" required autofocus>
                        
                    </div>
                     <div>
                        <input id="o_name" type="text" class="form-control" name="o_name"  value = "{{Auth::user()->other_names }}"  placeholder="Other Name" required autofocus>
       
                    </div>
                    <div>
                        <input id="dob" type="date" class="form-control" name="dob"  value = "{{Auth::user()->birthday }}" placeholder="Date of Birth" required autofocus>
                       
                    </div>
                     <div>
                        <input id="next_of_kin" type="text" class="form-control" name="next_of_kin"  value = "{{Auth::user()->next_of_kin }}"  placeholder="Next of Kin" required autofocus>
                        
                    </div>
                     <div>
                        <input id="mother_median" type="text" class="form-control" name="mother_m_name"  value = "{{Auth::user()->mother_m_name}}" placeholder="Mother Median Name" required autofocus>
                        
                    </div>
                          
                </div>
                  <div class="animate col-md-4">       
                    <div>
                        <input id="username" required type="text" class="form-control" name="username"  value = "{{Auth::user()->username}}" placeholder="Choose a Username" required autofocus>
                         @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                     <div>
                        <input id="email" required type="email" class="form-control" name="email"  value = "{{Auth::user()->email}}" placeholder="Email Address" required autofocus>
                        
                    </div>
                     <div>
                        <input id="phone" required type="number" class="form-control" name="phone"  value = "{{Auth::user()->phone }}" placeholder="Phone Number" required autofocus>
       
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
                     
                    
                    
                </div>

                <div class="animate col-md-4">
                    <div>
                       
                        <textarea class="form-control" rows="3" name="r_address"  value = "{{ old('r_address') }}" placeholder='Residential Address'></textarea>
                        
                    </div>

                    <div>
                       
                        <textarea class="form-control" rows="3" name="h_address"  value = "{{ old('h_address') }}" placeholder='Home Address'></textarea>
                        
                    </div>
                     <div>
                        <input  type="text" class="form-control" name="lga"  value = "{{Auth::user()->lga}}"  placeholder="Local Govt." required autofocus>
       
                    </div>
                     <div>
                        <input  type="text" class="form-control" name="state"  value = "{{Auth::user()->state }}"  placeholder="State" required autofocus>
       
                    </div>
                    <div class="ln_solid"></div>

                    <div>
                                                               
                        <button type="submit" class="btn btn-primary">
                           Update Profile
                        </button>
                        <a class="reset_pass" href="#">
                            crosscheck details for correctness
                        </a>
                    </div>
                    
                </div>
                <div class="clearfix"></div>

            </form>   
            
            </section>
        
        </div>
            
           

          </div>
        </div>
    <!-- /page content -->
      

     

@endsection


@section('footer')
  @include('partials.admin.footer')
@endsection



@section('scripts')
     <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="../js/custom.js"></script>
@endsection