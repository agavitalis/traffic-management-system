<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Sign;
use Illuminate\Support\Facades\Storage;

class SignController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
     public function new_sign(Request $request){
        
        if($request->isMethod('GET')){
            //display the view              
            return view('admin.new_sign',compact(''));
        }
        elseif($request->isMethod('POST'))
        {
            //check and process the picture
            if ($request->hasFile('picture')){

                //get the filename with the extension
                $filenamewithExt=$request->file('picture')->getClientOriginalName();
                //get just the filename 
                $filename=pathinfo($filenamewithExt,PATHINFO_FILENAME);
                //just get the extension
                $extension=$request->file('picture')->getClientOriginalExtension();
                
                //the file to store in the db
                $filenameTostore=$filename.'_'.time().'.'.$extension;

                //upload the image to serve in the storage directory
                $upload = $request->file('picture')->storeAs('public',$filenameTostore);
                if($upload){

                    $sign = new Sign;
                    
                    $sign->sign_name = $request->sign_name;
                    $sign->sign_description = $request->description;
                    $sign->sign_picture =  $filenameTostore;
                  
                    $sign->save();

                    return back()->with('success','Traffic sign, successfully registereded');

                    
                }else{

                     return back()->with('error','An Erroroccured, file cannot be uploaded');

                }

            }
            else{
                return back()->with('error','Please Select a picture to depict the traffic signal');
            }
           
        } 
    }


    public function manage_signs( $id = null){
        if($id == null){
            $signs  =   DB::table('signs')->get();    
            return view('admin.manage_signs',compact('signs'));
        }
        else{
            //get that particular sign
            $sign = Sign::find($id);
            //delete sign picture from storge
            Storage::delete($sign->sign_picture);
            //delete drom db
            $sign->delete();

            return back()->with('success','Traffic sign deleted, successfully');

        }
    }    
    


}
