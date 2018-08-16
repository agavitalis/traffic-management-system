
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
                    <h3>Vehicle Registration Form</h3>
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
            <div class="reg-style col-md-12 "><h1>Vehicle Registration Form</h1></div>
            <form class="form-horizontal" method="POST" action="{{ route('admin_register_vehicles') }}">
                <div class="animate col-md-6">

                    {{ csrf_field() }}
                    <div>
                        <input type="text" class="form-control" name="username"  value = "{{ old('username') }}" placeholder="Owner Username" required autofocus>
       
                    </div>
                     <div>
                        <input  type="text" class="form-control" name="v_name"  value = "{{ old('v_name') }}" placeholder="Vehicle Name" required autofocus>
       
                    </div>
                     <div>
                        <input type="text" class="form-control" name="v_type"  value = "{{ old('v_type') }}" placeholder="Vehicle Type (Eg Truck)" required autofocus>
       
                    </div>
                    <div>
                        <input  type="text" class="form-control" name="v_brand"  value = "{{ old('v_brand') }}" placeholder="Vehicle Brand(Toyota 420) " required autofocus>
       
                    </div>
                    <div>
                        <input  type="text" class="form-control" name="v_color"  value = "{{ old('v_color') }}" placeholder="Vehicle Color" required autofocus>
       
                    </div>
                    
                                    
                </div>

                <div class="animate col-md-6">
                    <div>
                        <input  type="text" class="form-control" name="engine_no"  value = "{{ old('engine_no') }}"  placeholder="Vehicle Engine Number" required autofocus>
       
                    </div>
                                    
                   <div>
                        <input  type="text" class="form-control" name="chasis_no"  value = "{{ old('chasis_no') }}" placeholder="Vehicle Chasis Number" required autofocus>
       
                    </div>

                    <div>
                        <input  type="text" class="form-control" name="vehicle"  value = "{{ old('vehicle') }}" placeholder="Vehicle Registration Number" required autofocus>
                         @if ($errors->has('vehicle'))
                            <span class="help-block">
                                <strong>{{ $errors->first('vehicle') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div>
                       
                        <textarea class="form-control" rows="3" name="remarks" placeholder='Remarks'></textarea>
                        
                    </div>
                    
                    <div class="ln_solid"></div>

                    <div>
                        
                                        
                        <button type="submit" class="btn btn-success btn-flat pull-right">
                           Register Vehicle
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