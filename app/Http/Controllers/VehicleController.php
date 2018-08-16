<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
Use Validator;
use App\Model\User;
use App\Model\Vehicle;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

 

    public function register_vehicles(Request $request){
       
        if($request->isMethod('GET')){
            //get all my organizations
            $users  =   DB::table('users')->get();    
            return view('admin.register_vehicles',compact('users'));
        }        
        elseif($request->isMethod('POST'))
        {
            //validate this input
            $validatedData = $request->validate([
                'vehicle'=>'required|unique:vehicles'         
            ]);

            
            $check  =   DB::table('users')->where('username', $request->username)->first();
            if($check == null){
                return back()->with("error","This Vehicle owner does not exist");
            }
            else{

                $vehicle = new Vehicle;
                
                $vehicle->owner = $request->username;

                $vehicle->vehicle = $request->vehicle;
                $vehicle->vehicle_name = $request->v_name;
                $vehicle->vehicle_type = $request->v_type;
                $vehicle->vehicle_brand =  $request->v_brand;
                $vehicle->vehicle_color = $request->v_color;

                $vehicle->engine_number = $request->engine_no;
                $vehicle->chassis_number = $request->chasis_no;
                
                $vehicle->remarks = $request->remarks;
                $vehicle->registered_by =  Auth::user()->username;
               

                $vehicle->save();

                return back()->with('success','Vehicle, successfully registereded');
            }

                
        } 
          
    }
    
    public function manage_vehicles( $id = null){
        if($id == null){
            //get all my organizations
            $vehicles  =   DB::table('vehicles')->get();    
            return view('admin.manage_vehicles',compact('vehicles'));
        }
        else{
            
            //delete a vehicle

            Vehicle::find($id)->delete();
            return back()->with('success','Vehicle deleted, successfully');


        }
          
    }
   
    
}
