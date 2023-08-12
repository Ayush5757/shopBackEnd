<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
  // Validation required
  
    public function addUserProfile(Request $request){
        try {
            // $result = DB::table('users')->insert(['shopName'=>$request->name]);
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
          // $result = DB::table('users')->insert(['shopName'=>$request->name]);
          // return response()->json(['message'=>'User Datails','id'=>$id],200);
          $user = DB::table('users')->where('id', $request->id)->first();
          return response()->json(['message'=>'User Datails','data'=>$user],200);
      } catch (\Throwable $th) {
          return $th;
      }
  }

}
