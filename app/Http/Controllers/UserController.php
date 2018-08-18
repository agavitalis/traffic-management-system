<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Organization;
use Auth;
use DB;
use App\Model\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     

    
    public function index(){
       
        $vehicles=DB::table('vehicles')->where(['owner'=>Auth::user()->username])->get()->count();
        $messages=DB::table('messages')->where(['username'=>Auth::user()->username])->get()->count();
        $offences=DB::table('offenders')->where(['offender'=>Auth::user()->username])->get()->count();
      
        return view('user.index',compact('vehicles','messages','offences')); 
              
    }

    public function view_vehicles(Request $request){
        if($request->isMethod('GET'))
        {
            //get all my vehicles
            $vehicles  =   DB::table('vehicles')->where('owner',Auth::user()->username)->get();
            
            return view('user.view_vehicles',compact('vehicles')); 
        }
       
    }

    public function view_messages(Request $request, $id = null){
        if($request->isMethod('GET') && $id == null)
        {
            //get all my messages
            $messages  =   DB::table('messages')->where('username',Auth::user()->username)->get();
            
            return view('user.view_messages',compact('messages')); 
        }
        
    }

    public function view_offences( $id=null, Request $request){
        if($request->isMethod('GET') &&  $id == null)
        {
            //get all my offences
            $offences  =   DB::table('offenders')->where(['offender'=>Auth::user()->username,'status'=>'Unresolved'])->get();                   
            return view('user.view_offences',compact('offences')); 
        }
        elseif($request->isMethod('GET') &&  $id != null)
        {
            //get that particular offences         
            $offence  =   DB::table('offenders')->where('id',$id)->first();                             
            return view('user.pay_offence',compact('offence'));
         
        }
    }


    public function profile()
    {
        return view('user.profile',compact(''));
    }


    public function edit_profile(Request $request)
    {
        
        if($request->isMethod('GET'))
        { 
            return view('user.edit_profile',compact(''));
        }
        elseif($request->isMethod('POST'))
        {
             //validate this input
            $validatedData = $request->validate([
                'username'=>'required',
                'email'=>'required'
            ]);
            //update organization details
            $user = User::find(Auth::user()->id);
               
                $user->first_name = $request->f_name;
                $user->last_name = $request->s_name;
                $user->other_names = $request->o_name;
                $user->username =  $request->username;
                $user->email = $request->email;
                $user->phone = $request->phone;

                $user->next_of_kin = $request->next_of_kin;
                $user->mother_m_name = $request->mother_m_name;
                $user->birthday = $request->dob;
                $user->password = bcrypt($request->password);
                $user->res_address = $request->r_address;
                $user->home_address =  $request->h_address;
                $user->lga =  $request->lga;
                $user->state =  $request->state;
               
                $user->picture ="";
            $user->save();

            return back()->with('success','Profile, successfully updated');
        }
    }
}
