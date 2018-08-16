
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
              @include('partials.admin.alert')

            
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-xs-12  widget_tally_box">
                    <div class="x_panel fixed_height_390">
                        <div class="x_content">

                        <div class="flex">
                            <ul class="list-inline widget_profile_box">
                            <li>
                                <a>
                                <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <img src="images/user.png" alt="..." class="img-circle profile_img">
                            </li>
                            <li>
                                <a>
                                <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            </ul>
                        </div>

                        <h3 class="name">{{Auth::user()->last_name}} {{Auth::user()->first_name}}</h3>

                        <div class="flex">
                            <ul class="list-inline count2">
                            <li>
                                <h4>Email</h4>
                                <span>{{Auth::user()->email}}</span>
                            </li>
                            <li>
                                <h4>Username</h4>
                                <span>{{Auth::user()->username}}</span>
                            </li>
                            <li>
                                <h4>Phone</h4>
                                <span>{{Auth::user()->phone}}</span>
                            </li>
                            </ul>
                        </div>
                        <p>
                            {{Auth::user()->about}}
                        </p>
                        </div>
                    </div>
                </div>

              <div class="clearfix"></div>

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