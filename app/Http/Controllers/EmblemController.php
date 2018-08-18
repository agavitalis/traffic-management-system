<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Emblem;
use DB;

class EmblemController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function add_emblem(Request $request){

        if($request->isMethod('GET')){

            return view('admin.add_emblem');
        }
        elseif($request->isMethod('POST')){

            $emblem = new Emblem;

            $emblem->name = $request->name;
            $emblem->amount = $request->price;
            $emblem->description = $request->description;
            $emblem->valid_from = $request->valid_from;
            $emblem->valid_to = $request->valid_to;
            $emblem->number = $request->number;
            $emblem->vehicle_type = $request->vehicle_type;

            $emblem->save();

            return back()->with('success','Emblem successfully created');

            
        }
    }


    public function manage_emblem(Request $request, $id=null){
        
        if($request->isMethod('GET') && $id == null){

            $emblems  =   DB::table('emblems')->get(); 
            return view('admin.manage_emblem',compact('emblems'));
        }
        else{
             //delete a emblem

            Emblem::find($id)->delete();
            return back()->with('success','Emblem deleted, successfully');

        }
    }

    public function view_purchases($id = null){
         if($id == null){

            $transactions  =   DB::table('transactions')->get(); 
            return view('admin.view_purchases',compact('transactions'));
        }
        else{

            $transactions  =   DB::table('transactions')->where('emblem_id',$id)->get(); 
            return view('admin.view_purchases',compact('transactions'));

        }
    }

}
