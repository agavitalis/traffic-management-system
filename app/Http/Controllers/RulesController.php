<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Rule;

class RulesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function new_rule(Request $request){
        
        if($request->isMethod('GET')){
            //display the view              
            return view('admin.new_rule',compact(''));
        }
        elseif($request->isMethod('POST'))
        {
               $count=DB::table('rules')->where(['rule_id'=>$request->rule_number])->get()->count();
               
               if($count < 1){

                    $rule = new Rule;
                    
                    $rule->rule_id = $request->rule_number;

                    $rule->rule_name = $request->rule_name;
                    $rule->rule_description = $request->description;
                    $rule->rule_penalty =  $request->charge;
                    $rule->penalty_description =  $request->penalty;
                
                    $rule->save();

                    return back()->with('success','Rule, successfully registereded');
               }else{
                    return back()->with('error','Rule Number, already exist');
               }
        } 
    }


    public function manage_rules( $id = null){
        if($id == null){
            $rules  =   DB::table('rules')->get();    
            return view('admin.manage_rules',compact('rules'));
        }
        else{
             //delete a rule

            Rule::find($id)->delete();
            return back()->with('success','Rule deleted, successfully');

        }
    }    
}
