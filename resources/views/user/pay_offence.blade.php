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
                    <h3>Make Payments for offence ID: {{$offence->offence}} </h3>
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

            
            <div class="row">
              <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i>Choose your prefered payment option <small>(pay with cards or through banks)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pay with Credit Cards</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pay by Bank </a>
                        </li>
                       
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <div class="x_content">
                                <br/>
                                <form class="form-horizontal form-label-left input_mask" >
                                    {{csrf_field()}}

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="p_fname" placeholder="First Name" value="{{Auth::user()->first_name}}">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control" id="p_lname" placeholder="Last Name" value="{{Auth::user()->last_name}}">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="p_email" placeholder="Email" value="{{Auth::user()->email}}">
                                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control" id="p_phone" placeholder="Phone" value="{{Auth::user()->phone}}">
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="hidden" class="form-control has-feedback-left" id="p_id"  disabled value="{{$offence->id}}">
                                        <input type="hidden" class="form-control has-feedback-left" id="offence"  disabled value="{{$offence->offence}}">
                                       
                                        <input type="text" class="form-control has-feedback-left" id="p_offence" placeholder="Offence ID"  disabled value="Offence ID:{{$offence->offence}}">
                                        <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="number" class="form-control" id="p_amount" disabled placeholder="Amount" value="{{$offence->penalty}}">
                                        <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                  
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea class="form-control" rows="3" id="p_summary" value="{{$offence->penalty_description}}" placeholder="Payment Summary..."></textarea>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <!-- message box -->
                                    <div class="p_message hidden alert alert-danger text-center"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                            <button class="btn btn-primary  pull-right" type="reset">Reset</button>
                                            <button type="button" id="p_pay" class="btn btn-success  pull-right">Complete Payment</button>
                                        </div>
                                    </div>
                                    <script src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                </form>
                                
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
                             <div class="x_content">
                                <br/>
                                <form class="form-horizontal form-label-left input_mask" method="POST" action="{{ route('make_payment')}}">

                                     {{ csrf_field() }}
                                    <input type="hidden" name="w_action" value="with_wallet">

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" name="w_fname" placeholder="First Name"  value="{{Auth::user()->first_name}}">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control" name="w_lname" placeholder="Last Name"  value="{{Auth::user()->last_name}}">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" name="w_email" placeholder="Email"  value="{{Auth::user()->email}}">
                                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control" name="w_phone" placeholder="Phone" value="{{Auth::user()->phone}}">
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control" name="w_offence" disabled placeholder="Offence" diabled value="Offence ID: {{$offence->offence}}">
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="number" class="form-control"required  name="w_amount" disabled value="{{$offence->penalty}}" placeholder="Amount">
                                        <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                   

                                  
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea class="form-control" required rows="3" name="w_summary" placeholder="{{$offence->penalty_description}}"></textarea>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                            <button class="btn btn-primary  pull-right" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success  pull-right">Generate RRR to Complete Payment</button>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>
                       
                      </div>
                    </div>

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
    
    

    <script>
        $(document).ready(function(){

            $('#p_pay').click(function(){

                //check ifall the fields are filled
                if( $('#p_fname').val()==""|| $('#p_lname').val()=="" || $('#p_email').val()=="" || $('#p_phone').val()=="" || $('#p_offence').val()=="" || $('#p_amount').val()=="" || $('#p_summary').val()=="")
                {
                    $('.p_message').removeClass('hidden');
                    $('.p_message').text("Please fill all fields");
                }
                else
                {
                     $('.p_message').addClass('hidden');
                     //generate a random rransaction id
                     function makeid() {
                        var text = "";
                        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                        for (var i = 0; i < 8; i++)
                            text += possible.charAt(Math.floor(Math.random() * possible.length));

                        return text;
                        }

                        var transID = makeid();
                        const API_publicKey = "FLWPUBK-3f9b0d8bc9eacc5ce6ee9e167c613c62-X";
                        
                        
                                   

                        // //start the payment process
                        var x = getpaidSetup({
                            PBFPubKey: API_publicKey,
                            customer_firstname:$('#p_fname').val(),
                            customer_lastname:$('#p_lname').val(),
                            customer_email: $('#p_email').val(),
                            amount: $('#p_amount').val(),
                            customer_phone: $('#p_phone').val(),
                            currency: "NGN",
                            payment_method: "both",
                            txref: transID,
                            meta: [{
                                metaname: "flightID",
                                metavalue: "AP1234"
                            }],
                            onclose: function() {},
                            callback: function(response) {
                                var txref = response.tx.txRef; // collect flwRef returned and pass to a 					server page to complete status check.
                                //console.log("This is the response returned after a charge", response);
                                if ( response.tx.chargeResponseCode == "00" || response.tx.chargeResponseCode == "0"  ) {
                                    //start an ajax call
                                    $.ajax({
                                        type:"POST",
                                        url:"/make_payment",
                                        data:{
                                            '_token': $('input[name=_token]').val(),
                                            'action':'with_atm',
                                            'fname':$('#p_fname').val(),
                                            'lname':$('#p_lname').val(),
                                            'email':$('#p_email').val(),
                                            'amount':$('#p_amount').val(),
                                            'phone':$('#p_phone').val(),
                                            'trans_id':transID,
                                            'offence_id':$('#p_id').val(),
                                            'offence':$('#offence').val(),
                                            'summary':$('#p_summary').val()
                                        },
                                        dataType:'JSON',
                                        success:function(data){
                                            x.close(); // use this to close the modal immediately after payment.

                                            $('.p_message').removeClass('hidden');
                                            $('.p_message').removeClass('alert-danger');
                                            $('.p_message').addClass('alert-success');
                                            $('.p_message').text("Your payment completed successfully.. Click on Receipts tab to Print Your Receipt");
                                        }
                                    })

                                } else {
                                    // redirect to a failure page.
                                }

                               
                            }
                        });
                }
            })
            
        
            
     
    });    
    </script>

    <script src="../js/custom.js"></script>
@endsection