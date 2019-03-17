<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Input;
Use Validator;
Use Response;
use DB;
use Auth;
use App\Model\Transaction;


class TransactionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function buy_emblem(Request $request){
         if($request->isMethod('GET'))
        {
            //select all his vehicles
            $vehicles  =   DB::table('vehicles')->where(['owner'=>Auth::user()->username])->get(); 
            $count = 0;
            // dd($vehicles);
        

            foreach($vehicles as $vehicle){       
                //select the individual emblems for the vehicles
                $emblems  =   DB::table('emblems')->where(['vehicle_type'=>$vehicle->vehicle_type])->first(); 
                if($emblems == null){
                    return back()->with('error','Opps, no emblems created for your vehicle type');
                }
            // dd($emblems);
                $his_vehicle =   array (
                                        'vehicle' => $vehicle->vehicle,
                                        'vehicle_type' => $vehicle->vehicle_type,
                                        'vehicle_color' => $vehicle->vehicle_color,
                                        'vehicle_brand' => $vehicle->vehicle_brand,
                                        'engine_number' => $vehicle->engine_number,
                                        'chassis_number' => $vehicle->chassis_number,

                                        'emblem_name' => $emblems->name,
                                        'emblem_number' => $emblems->number,
                                        'emblem_description' => $emblems->description,
                                        'emblem_valid_from' => $emblems->valid_from,
                                        'emblem_valid_to' => $emblems->valid_to,
                                        'emblem_amount' => $emblems->amount,
                                        'emblem_id' => $emblems->id,
                                        'emblem_created_at' => $emblems->created_at,
                                                    
                                        
                                    );
            // array_push($his_vehicles[$count][$his_vehicle]);
                $his_vehicles[$count][] = $his_vehicle;
                $count ++;
            }
    
            //dd($his_vehicles);
            
            //get his offences and sum them
            $debt  =   DB::table('offenders')->where(['offender'=>Auth::user()->username, 'status'=>'Unresolved'])->pluck('penalty')->sum(); 
            //dd($debt);
            return view('user.buy_emblems',compact('his_vehicles','debt'));
        }
        elseif($request->isMethod('POST')){
            
           //get the emblem name using its ID
           $emblem  =   DB::table('emblems')->where(['id'=>$request->emblem_id])->first(); 
                     

            $transaction = new Transaction;

            $transaction->username = Auth::user()->username;
            $transaction->transaction_id = $request->trans_id;
            $transaction->amount = $request->amount;
            $transaction->emblem_id = $request->emblem_id;
            $transaction->emblem_name =$emblem->name; 
            $transaction->vehicle_id = $request->vehicle_id;
            $transaction->transaction_type = "ATM";
            $transaction->transaction_status = "SUCCESSFUL";

            $transaction->save();
            

            return Response::json($request);
        }

    }

    public function emblem_receipt($id = null) {
       if($id == null){
            
        $transactions  =   DB::table('transactions')->where('username',Auth::user()->username)->get();
        return view('user.view_transactions',compact('transactions'));

       }
       else{
            $transaction = Transaction::find($id);
            return view('user.receipt_transaction',compact('transaction'));
       }
    }
}
