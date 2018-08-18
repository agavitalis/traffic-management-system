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
                        <h3>Make Payments</h3>
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
              <div class="col-md-8 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title r-title" >
                    <h2>Emblem Receipt <small> from Traffic Safety</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                             <i class="fa fa-ambulance"></i>Traffic Safety.
                                         
                         </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                            <address>
                                <strong>Traffic Safety, Corp.</strong>
                                <br>Phone:+234 81 639 22749
                                <br>Email: info@trafficsafety.com
                                <br> <strong>##EMBLEM RECEIPT</strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Receipt #{{$transaction->transaction_id}}</b>
                          <br>
                          <br>
                          <b>Trans ID:</b> {{$transaction->transaction_id}}
                          <br>
                          <b>Date:</b> {{$transaction->created_at}}
                          <br>
                          <b>Emblem:</b> {{$transaction->emblem_name}}
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Payment From</th>
                                <th>For</th>  
                                <th>Vehicle No</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</td>
                                <td>{{$transaction->emblem_name}}</td>
                                <td>{{$transaction->vehicle_id}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td>{{$transaction->transaction_type}}</td>
                                <td>{{$transaction->transaction_status}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                
                          <img src="../images/4.jpg" height="75px"width="150px" alt="Visa">
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead">Paid on: {{$transaction->created_at}}</p>
                          <div class="table-responsive">
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            ...Your safety is our concern:Drive with caution
                          </p>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button class="print-btn btn btn-success btn-flat pull-right" onclick="printing();"><i class="fa fa-print"></i> Print</button>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
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
    
    <script src="../js/custom.js"></script>
    <script>
        function printing() {
            $('.toggle').hide();
            $('.navbar-nav').hide();
            $('.page-title').hide();
            $('.r-title').hide();
            $('.print-btn').hide();
           
            window.print();
        }
    </script>
@endsection