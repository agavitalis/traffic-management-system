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
     public function __construct()
    {
        $this->middleware('auth');
    }
   

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

                //get the details of this user 
                $user  =   DB::table('users')->where('username', $vehicle->owner)->first();
                
                  
                $offender = new Offender;
                    
                $offender->offender = $vehicle->owner;

                $offender->vehicle_id = $vehicle->vehicle;
                $offender->offence = $offence->rule_id;
                $offender->description =  $offence->rule_description;
                $offender->penalty =  $offence->rule_penalty;
                $offender->penalty_description =  $offence->penalty_description;
            
                $offender->save();

                ////sms shit goes here
                $json_url = "http://api.ebulksms.com:8080/sendsms.json";
               // $xml_url = "http://api.ebulksms.com:8080/sendsms.xml";
               
                $username ='vivvaa.vivvaa@gmail.com';
                $apikey = 'baeb2dfbf4cc3335afea1a93ccd8f729750bd1c4';
                $sendername = 'TSafety';
                $recipients = $user->phone;
                $message = 'You have been booked on offence '.$request->offence.'.Log to your dashboard for details';
                $flash = 0;

                $result = $this->useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);

                return back()->with('success','Offender, successfully logged    '.$result);

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

    //sms shit goes here
    public function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
        $gsm = array();
        $country_code = '234';
        $arr_recipient = explode(',', $recipients);
        foreach ($arr_recipient as $recipient) {
            $mobilenumber = trim($recipient);
            if (substr($mobilenumber, 0, 1) == '0'){
                $mobilenumber = $country_code . substr($mobilenumber, 1);
            }
            elseif (substr($mobilenumber, 0, 1) == '+'){
                $mobilenumber = substr($mobilenumber, 1);
            }
            $generated_id = uniqid('int_', false);
            $generated_id = substr($generated_id, 0, 30);
            $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
        }
        $message = array(
            'sender' => $sendername,
            'messagetext' => $messagetext,
            'flash' => "{$flash}",
        );

        $request = array('SMS' => array(
                'auth' => array(
                    'username' => $username,
                    'apikey' => $apikey
                ),
                'message' => $message,
                'recipients' => $gsm
        ));
        $json_data = json_encode($request);
        if ($json_data) {
            $response = $this->doPostRequest($url, $json_data, array('Content-Type: application/json'));
            $result = json_decode($response);
            return $result->response->status;
        } else {
            return false;
        }
    }

    //Function to connect to SMS sending server using HTTP POST
    public function doPostRequest($url, $data, $headers = array('Content-Type: application/x-www-form-urlencoded')) {
        $php_errormsg = '';
        if (is_array($data)) {
            $data = http_build_query($data, '', '&');
        }
        $params = array('http' => array(
                'method' => 'POST',
                'content' => $data)
        );
        if ($headers !== null) {
            $params['http']['header'] = $headers;
        }
        $ctx = stream_context_create($params);
        $fp = fopen($url, 'rb', false, $ctx);
        if (!$fp) {
            return "Error: gateway is inaccessible";
        }
        //stream_set_timeout($fp, 0, 250);
        try {
            $response = stream_get_contents($fp);
            if ($response === false) {
                throw new Exception("Problem reading data from $url, $php_errormsg");
            }
            return $response;
        } catch (Exception $e) {
            $response = $e->getMessage();
            return $response;
        }
    }
}
