
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
                    <h3>User Registration Form</h3>
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
              @include('partials.admin.alert')

            
           <div class="register_wrapper">

            <section class="login_content"> 
            <div class="reg-style col-md-12 "><h1>User Registration Form</h1></div>
            <form class="form-horizontal" method="POST" action="{{ route('admin_register_users') }}">
                <div class="animate col-md-4">

                    {{ csrf_field() }}
                    <div>
                        <input id="f_name" type="text" class="form-control" name="f_name" value = "{{ old('f_name') }}" placeholder="First Name" required autofocus>
       
                    </div>
                     <div>
                        <input id="s_name" type="text" class="form-control" name="s_name"  value = "{{ old('s_name') }}" placeholder="Last Name" required autofocus>
       
                    </div>
                     <div>
                        <input id="o_name" type="text" class="form-control" name="o_name"  value = "{{ old('o_name') }}"  placeholder="Other Name" required autofocus>
       
                    </div>
                    <div>
                        <input id="dob" type="date" class="form-control" name="dob"  value = "{{ old('dob') }}" placeholder="Date of Birth" required autofocus>
       
                    </div>
                     <div>
                        <input id="next_of_kin" type="text" class="form-control" name="next_of_kin"  value = "{{ old('next_of_kin') }}"  placeholder="Next of Kin" required autofocus>
       
                    </div>
                     <div>
                        <input id="mother_median" type="text" class="form-control" name="mother_m_name"  value = "{{ old('mother_m_name') }}" placeholder="Mother Median Name" required autofocus>
       
                    </div>
                    <!-- <div>
                         <span>I want to be payed on</span>
                        <input id="withdraw_date" type="date" class="form-control" name="withdraw_date" placeholder="I want to be payed on?" required autofocus>
                       
                           
                    </div> -->
                                    
                </div>
                  <div class="animate col-md-4">

                    
                    <div>
                        <input id="username" type="text" class="form-control" name="username"  value = "{{ old('username') }}" placeholder="Choose a Username" required autofocus>
                         @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                     <div>
                        <input id="email" type="email" class="form-control" name="email"  value = "{{ old('email') }}" placeholder="Email Address" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                     <div>
                        <input id="phone" type="number" class="form-control" name="phone"  value = "{{ old('phone') }}" placeholder="Phone Number" required autofocus>
       
                    </div>
                     <div>
                       
                        <textarea class="form-control" rows="3" name="r_address"  value = "{{ old('r_address') }}" placeholder='Residential Address'></textarea>
                        
                    </div>
                    
                    
                </div>

                <div class="animate col-md-4">

                   
                   
                  

                    <div>
                       
                        <textarea class="form-control" rows="3" name="h_address"  value = "{{ old('h_address') }}" placeholder='Home Address'></textarea>
                        
                    </div>
                     <div>
                        <input  type="text" class="form-control" name="lga"  value = "{{ old('lga') }}"  placeholder="Local Govt." required autofocus>
       
                    </div>
                     <div>
                        <input  type="text" class="form-control" name="state"  value = "{{ old('state') }}"  placeholder="State" required autofocus>
       
                    </div>
                    <div class="ln_solid"></div>

                    <div>
                        
                                        
                        <button type="submit" class="btn btn-primary">
                           Register User
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