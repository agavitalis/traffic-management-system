<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Sign;

class SignController extends Controller
{
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


    public function manage_rules( $id = null){
        if($id == null){
            $signs  =   DB::table('signs')->get();    
            return view('admin.manage_signs',compact('signs'));
        }
        else{
             //delete a rule

            Rule::find($id)->delete();
            return back()->with('success','Rule deleted, successfully');

        }
    }    
    //  elseif($request->isMethod('POST')){

    //       // 'profile_pic'->'image|nullable|max:1999';
    //       if ($request->hasFile('profile_pic')){
    //         //get the filename with the extension
    //         $filenamewithExt=$request->file('profile_pic')->getClientOriginalName();
    //         //get just the $filename
    //         $filename=pathinfo($filenamewithExt,PATHINFO_FILENAME);
    //         $extension=$request->file('profile_pic')->getClientOriginalExtension();
    //         //the file to store
    //         $filenameTostore=$filename.'_'.time().$extension;
    //         //upload the image
    //         $path=$request->file('profile_pic')->STOREAS('public/profile_images',$filenameTostore);
    //       }
    //       else{
    //         $filenameTostore='user1-128x128.jpg';
    //       }
    //         $lecturer = Lecturer::find(Auth::user()->username);

    //         $lecturer->profile_pic=$filenameTostore;
    //         $lecturer->update();

    //         return back()->with('success','Profile Picture Successfully Updated');
    //     }


}
