<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{ 
    public function addUserProfile(Request $request){
        try {
            DB::table('users')->where('id', $request->id)->
            update(array('name' => $request->name,'mobileNumber'=>$request->mobileNumber,
          'wathsappNumber'=>$request->wathsappNumber,'email'=>$request->email,
        'gender'=>$request->gender,'others'=>$request->others)); 
            return response()->json(['message'=>'Data inserted Successfully'],200);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    
    public function getUserDetails(Request $request,$id){
      try {
          $user = DB::table('users')->where('id', $request->id)->first();
          return response()->json(['message'=>'User Datails','data'=>$user],200);
      } catch (\Throwable $th) {
          return $th;
      }
  }

}
