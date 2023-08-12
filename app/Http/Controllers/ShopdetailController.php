<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ShopdetailController extends Controller
{
    public function getShopDetails(Request $request,$id)
    {
      try {
        $user = DB::table('shopdetails')->where('userid',$id)->first();
        return response()->json(['message'=>'Shopt Details','data'=>$user],200);
      } catch (\Throwable $th) {
        return $th;
      }
    }

    public function addShopDetails(Request $request)
    {
      try {
          if($request->id){
            $result = DB::table('shopdetails')->where('userid', $request->userid)->update(['shopName'=>$request->shopName,
            'shopAddress'=>$request->shopAddress,'googleMapAddress'=>$request->googleMapAddress,'description'=>$request->description,
            'experience'=>$request->experience]);     
            return response()->json(['message'=>'Data Updated Successfully'],200);
          }else{
            $result = DB::table('shopdetails')->insert(['userid'=>$request->userid,'shopName'=>$request->shopName,
            'shopAddress'=>$request->shopAddress,'googleMapAddress'=>$request->googleMapAddress,'description'=>$request->description,
            'experience'=>$request->experience]);
            return response()->json(['message'=>'Data Inserted Successfully'],200);
          }
       } catch (\Throwable $th) {
        return $th;
       }
    }
}
