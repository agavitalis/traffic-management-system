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
                    <h3>Buy Emblems Wallet</h3>
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
                   
                    <div class="col-md-12">
                            <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <ul class="pagination pagination-split">
                                   
                                    <li>...</li>
                                    <li><a href="#">E</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">B</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">E</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">S</a></li>
                                    <li>...</li>
                                    
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                                @foreach($his_vehicles as $his_vehicle)

                                    <div class="col-md-6  col-xs-12 profile_details">
                                        <div class="well profile_view">
                                            <div class="col-sm-12">
                                                <h4 class="brief"><i>Emblem ID:{{$his_vehicle[0]['emblem_number']}}</i></h4>
                                                <div class="left col-xs-7">
                    
                    
                                                <h2>Name:{{$his_vehicle[0]['emblem_name']}}</h2>
                                                <p><strong>Created: </strong>{{ Carbon\Carbon::parse($his_vehicle[0]['emblem_created_at'])->diffForHumans() }}</p>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-user"></i> Created for:{{Auth::user()->last_name}} {{Auth::user()->first_name}} </li>
                                                    <li><i class="fa fa-car"></i> Vehicle No:{{$his_vehicle[0]['vehicle']}} </li>
                                                    
                                                    <li>Valid From #:{{$his_vehicle[0]['emblem_valid_from']}}    ...   To #:{{$his_vehicle[0]['emblem_valid_to']}}</li>
                                                    <li>Pending Payments:N{{$debt}}  </li>
                                                    <li>Emblem Price:N{{$his_vehicle[0]['emblem_amount']}}  </li>   
                                                    <li><i class="fa fa-credit-card"></i>Total Amount  :</li>
                                    
                                                </ul>
                                                    <div class="tile-stats">
                                                        <div class="count"><i class="fa fa-money"></i>  N{{$his_vehicle[0]['emblem_amount'] + $debt}}</div>
                                                    </div>
                                                </div>
                                                <div class="right col-xs-5 text-center">
                                                <img src="../images/emblem.jpg" alt="" class="img-circle img-responsive">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 emphasis">
                                                <button data-id="{{$his_vehicle[0]['emblem_id']}}" data-vehicle="{{$his_vehicle[0]['vehicle']}}" data-amount="{{$his_vehicle[0]['emblem_amount'] + $debt}}" data-debt="{{$debt}}" class=" buy btn btn-info btn-flat pull-right"><i class="fa fa-credit-card"> </i> Buy Emblem</button>                                   

                                            </div>
                                            <input type="hidden" value="{{Auth::user()->first_name}}" id="p_fname">
                                            <input type="hidden" value="{{Auth::user()->last_name}}" id="p_lname">
                                            <input type="hidden" value="{{Auth::user()->email}}" id="p_email">
                                            <input type="hidden" value="{{Auth::user()->last_name}}" id="p_phone">
                                            {{csrf_field()}}
                                           

                                        </div>
                                    </div>

                                @endforeach
                                 <div class="col-xs-12 col-sm-12 message-div alert hidden">
                                        <p class="message text-center"></p>      
                                </div>                      
                                </div>
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

     <!-- Rave API inline script -->
    <script src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                               
    <script>
        $(document).ready(function() {
            $('.buy').click(function(){

                let p_amount = $(this).data('amount');
                let debt = $(this).data('debt');
                let emblem_id = $(this).data('id');
                let vehicle_id = $(this).data('vehicle');
               
               if(debt > 0){        
                    $('.message-div').removeClass('hidden');
                    $('.message-div').addClass('alert-danger');
                    $('.message').text('Please pay a N' + debt + '  charge on the offence(s) you committed, to enable you buy this emblem');
               }
               else{
                    $('.message-div').removeClass('hidden');
                    $('.message-div').removeClass('alert-danger');
                    $('.message-div').addClass('alert-success');
                    $('.message').text('Please wait while we process your request..');
                    setTimeout(function () {
                       
                        function generateId() {
                            var text = "";
                            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                            for (var i = 0; i < 8; i++)
                                text += possible.charAt(Math.floor(Math.random() * possible.length));

                            return text;
                        }

                        var transID = generateId();
                        const API_publicKey = "FLWPUBK-3f9b0d8bc9eacc5ce6ee9e167c613c62-X";

                        // //start the payment process
                        var x = getpaidSetup({
                               
                                PBFPubKey: API_publicKey,
                                customer_firstname:$('#p_fname').val(),
                                customer_lastname:$('#p_lname').val(),
                                customer_email: $('#p_email').val(),
                                amount: p_amount,
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
                                            url:"/buy_emblems",
                                            data:{
                                                '_token': $('input[name=_token]').val(),
                                                'action':'with_atm',
                                                'amount':p_amount,
                                                'trans_id':transID,
                                                'vehicle_id':vehicle_id,
                                                'emblem_id':emblem_id,
                                                
                                            },
                                            dataType:'JSON',
                                            success:function(data){
                                                x.close(); // use this to close the modal immediately after payment.
                                                console.log(data);
                                                $('.message_div').removeClass('hidden');
                                                $('.message_div').removeClass('alert-danger');
                                                $('.message_div').addClass('alert-success');
                                                $('.message').text("Your payment completed successfully.. Click on Receipts tab to Print Your Receipt");
                                            }
                                        })

                                    } else {
                                        // redirect to a failure page.
                                    }

                            }
                        });


                    }, 3000)
            
               }
              
            })
        })
    </script>
    

	
    <script src="../js/custom.js"></script>
 
</body>
</html>
    
@endsection