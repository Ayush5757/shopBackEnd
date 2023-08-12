<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ShopImageController extends Controller
{
  public function uploadImage(Request $request)
  {
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'shopId' => 'required',
    ]);
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        
        $result = DB::table('shopimages')->insert(['imagePath'=>$imageName,'shopId'=>$request->shopId]);
        return response()->json(['message' => 'Image uploaded successfully','imagePath'=>$imageName]);
    }
     return response()->json(['message' => 'Image upload failed'], 500);
    }

    public function getImage(Request $request){
      $result = DB::table('shopimages')->where('shopID',$request->shopID)->get();
      return response()->json(['message' => 'All Images','images'=>$result]);
    }
} 
