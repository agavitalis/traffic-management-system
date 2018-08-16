<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Input;
Use Validator;
Use Response;
Use Auth;
Use DB;
Use App\Model\Payment;
Use App\Model\User;
Use App\Model\Offender;

class PaymentController extends Controller
{
    //function to generate random string
    public function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function payments(Request $request){
        if($request->isMethod('GET'))
        {    
            //select all my offences     
            $offences  =   DB::table('offenders')->where(['offender'=> Auth::user()->username, 'status'=>'Unresolved'])->get();
            return view('user.make_payment',compact('offences')); 
        }
        elseif($request->isMethod('POST'))
        {
            if($request->action =="with_atm"){

                $payment = new Payment;
                
                $payment->username = Auth::user()->username;
                $payment->transaction_id = $request->trans_id;
                $payment->amount = $request->amount;
                $payment->payment_for = $request->offence;
                $payment->transaction_details =  $request->summary;
                $payment->transaction_type = 'Debit_Card';
                $payment->transaction_status = 'successfull';
              

                $payment->save();
        
                //update the offender to resolved
                $offence = DB::table('offenders')->where(['id'=> $request->offence_id])->get()->count();
          
                //Update the offenders table
                if($offence > 0){
                   
                    $offence = Offender::find(  $request->offence_id);
                    $offence->status = "Resolved";
                    $offence->update(); 

                }
                


             return Response::json($request);
            }
         
        }
    }

    public function receipt($id = null) {
       if($id == null){
            
        $payments  =   DB::table('payments')->where('username',Auth::user()->username)->get();
        return view('user.view_payments',compact('payments'));

       }else {
            $payment = Payment::find($id);
            return view('user.receipt',compact('payment'));
       }
    }

   

    public function print_receipts(){
          $transactions  =   DB::table('transactions')->where('username',Auth::user()->username)->get();
        return view('user.print_receipts',compact('transactions'));
    }

     
    
  

}