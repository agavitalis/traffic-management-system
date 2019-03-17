@extends('layouts.app')

@section('header')
@include('partials.user.header')
@endsection

@section('body')

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
                <div class="page-title">
                <div class="title_left">
                    <h3>My Registered Vehicles</h3>
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
              @include('partials.user.alert')

            <div class="clearfix"></div>
            <div class="row">
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>My Registered Vehicles<small>(this cannot be edited)</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                            Your registered vehicles, you can have as many as possible.
                            </p>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            
                                <tr>
                                <th>Vehicle ID</th>
                                <th>Vehicle Name</th>
                                <th>Vehicle Type</th>
                                <th>Colour</th>
                                <th>Brand</th>
                                <th>Engine Number</th>
                                <th>Chasis Number</th>
                                <th>Remarks</th>
                                <th>Registered By</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)     
                                <tr>
                                <td>{{$vehicle->vehicle}}</td>
                                 <td>{{$vehicle->vehicle_name}}</td>
                                <td>{{$vehicle->vehicle_type}}</td>
                                <td>{{$vehicle->vehicle_color}}</td>
                                <td>{{$vehicle->vehicle_brand}}</td>
                                <td>{{$vehicle->engine_number}}</td>
                                <td>{{$vehicle->chassis_number}}</td>
                                <td>{{$vehicle->remarks}}</td>
                                <td>{{$vehicle->registered_by}}</td>
                               
                                </tr>
                                @endforeach
                                
                            </tbody>
                            </table>
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
  @include('partials.user.footer')
@endsection



@section('scripts')
     <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>
</body>
</html>
@endsection