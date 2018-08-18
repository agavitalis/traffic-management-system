<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Model\User;
Use Validator;
use App\Model\Organization;
use App\Model\Withdraw;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){
      
        $users=DB::table('users')->where(['user_type'=>'user'])->get()->count();
        $vehicles=DB::table('vehicles')->get()->count();
        $offenders=DB::table('offenders')->get()->count();
        $payments=DB::table('payments')->get()->count();
      
        return view('admin.index',compact('users','vehicles','offenders','payments'));
    }

    public function users($id = null){
        //get all my users
         if($id == null)
        {
            $users  =   DB::table('users')->where('user_type','user')->get();               
            return view('admin.view_users',compact('users'));
        }
        elseif( $id != null){
             $user = User::find($id);
            // dd($user);
             return view('admin.user_profile',compact('user'));
        }
    }

    public function register_users(Request $request){
         if($request->isMethod('GET'))
        { 
             $users  =   DB::table('users')->where('user_type','user')->get();
            
            return view('admin.register_users',compact('users'));
        }
        elseif($request->isMethod('POST'))
        {
            //validate this input
            $validatedData = $request->validate([
                'username'=>'required|unique:users',
                'email'=>'required|unique:users'
            ]);
             $user = new User;
                
                $user->first_name = $request->f_name;
                $user->last_name = $request->s_name;
                $user->other_names = $request->o_name;
                $user->username =  $request->username;
                $user->email = $request->email;
                $user->phone = $request->phone;

                $user->next_of_kin = $request->next_of_kin;
                $user->mother_m_name = $request->mother_m_name;
                $user->birthday = $request->dob;
                $user->user_type = "user";
                $user->password = bcrypt("user101");
                $user->res_address = $request->r_address;
                $user->home_address =  $request->h_address;
                $user->lga =  $request->lga;
                $user->state =  $request->state;
                $user->picture ="";

                $user->save();

            return back()->with('success','User, successfully sregistereded');
        } 
        //get all my users
          
    }

    

   
 
    public function profile()
    {
        return view('admin.admin_profile',compact(''));
    }


    public function edit_profile(Request $request)
    {
        if($request->isMethod('GET'))
        { 
            return view('admin.admin_edit_profile',compact(''));
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
