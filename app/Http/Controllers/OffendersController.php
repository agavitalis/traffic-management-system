<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Model\Offender;
use App\Model\Message;
use App\Model\Rule;
use Illuminate\Http\Request;

class OffendersController extends Controller
{


    public function log_offenders(Request $request){
        
        if($request->isMethod('GET')){
            //display the view         
            $rules  =   DB::table('rules')->get(); 
            //dd($rules);    
            return view('admin.new_offender',compact('rules'));
        }
        elseif($request->isMethod('POST'))
        {
            //check for the vehicle
            $vehicle  =   DB::table('vehicles')->where('vehicle', $request->vehicle)->first();
            if($vehicle == null){
                return back()->with("error","This Vehicle ID does not exist, pls do check again");
            }
            else {
                //get the offence details
                $offence  =   DB::table('rules')->where('rule_id', $request->offence)->first();
                //dd( $request->rule_id);
                //create a new offender
                $offender = new Offender;
                    
                $offender->offender = $vehicle->owner;

                $offender->vehicle_id = $vehicle->vehicle;
                $offender->offence = $offence->rule_id;
                $offender->description =  $offence->rule_description;
                $offender->penalty =  $offence->rule_penalty;
                $offender->penalty_description =  $offence->penalty_description;
            
                $offender->save();

                return back()->with('success','Offender, successfully logged');

            }

                    
                
        } 
    }


    public function manage_offenders(Request $request, $id = null){
        
        if($request->isMethod('GET') && ($id == null)){

            $offenders  =   DB::table('offenders')->get();               
            return view('admin.manage_offenders',compact('offenders'));

        }
        elseif($request->isMethod('GET') && ($id != null))
        {
                            
            Offender::find($id)->delete();      
            return back()->with('success','Offender, successfully deleted');
                
        } 
    }


    public function manage_payments(Request $request){
        
        if($request->isMethod('GET')){
            $payments  =   DB::table('payments')->get();               
            return view('admin.manage_payments',compact('payments'));
        }
       
    }

    
    public function new_message(Request $request){
        
        if($request->isMethod('GET')){
                      
            return view('admin.new_message',compact(''));
        }
         elseif($request->isMethod('POST'))
        {
            //check for the username
            $user  =   DB::table('users')->where('username', $request->username)->first();
            if($user == null){
                return back()->with("error","Invalid User ID, Message cannot be sent");
            }
            else
            {
                $message = new Message;

                $message->username = $request->username;
                $message->message_title = $request->title;
                $message->message_body = $request->message;

                $message->sender = Auth::user()->username;
                $message->status = "UNREAD";

                $message->save();

                return back()->with('success','Message, successfully sent');
        
            }

            
             
        }

    }


    public function manage_message(Request $request){
        
        if($request->isMethod('GET')){
              
            $messages  =   DB::table('messages')->get();         
            return view('admin.manage_messages',compact('messages'));
        }
       

    }



}
