<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GeneralController extends Controller
{
    public function index(Request $request){    
        //display the view              
        return view('welcome',compact(''));
    }
        
    public function rules(Request $request){
            
        //display the view
        $rules  =   DB::table('rules')->get();          
        return view('traffic_rules',compact('rules'));
    }
    
    public function signs(Request $request){
        
         //display the view
        $signs  =   DB::table('signs')->get();                 
        return view('traffic_signs',compact('signs'));
    }
       

}
