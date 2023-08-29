<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ShopProduct extends Controller
{
  public function getShopProducts(Request $request,$user_ID){
    try {
        $products = DB::table('productshop')->where('user_ID', $user_ID)->get();
        return response()->json(['message'=>'get ShopProducts','data'=>$products],200);
    } catch (\Throwable $th) {
        return $th;
    }
}

  public function productAdding(Request $request){
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      if($request->id){
        $result = DB::table('productshop')->where('id', $request->id)->update(['user_ID'=>$request->user_ID,'product_name'=>$request->product_name,'price'=>$request->price,
        'product_company'=>$request->product_company,'product_quantity'=>$request->product_quantity,'product_description'=>$request->product_description,
        'image'=>$imageName,'categorie'=>$request->categorie]);
        return response()->json(['message'=>'Product Updated SuccessFully'],200);
      }else{
        $result = DB::table('productshop')->insert(['user_ID'=>$request->user_ID,'product_name'=>$request->product_name,'price'=>$request->price,
        'product_company'=>$request->product_company,'product_quantity'=>$request->product_quantity,'product_description'=>$request->product_description,
        'image'=>$imageName,'categorie'=>$request->categorie]);
        return response()->json(['message'=>'Product Added SuccessFully'],200);
      }
  }else{
    if($request->id){
      DB::table('productshop')->where('id', $request->id)-> update(array('user_ID'=>$request->user_ID,'product_name'=>$request->product_name,'price'=>$request->price,
      'product_company'=>$request->product_company,'product_quantity'=>$request->product_quantity,'product_description'=>$request->product_description,'categorie'=>$request->categorie)); 
      return response()->json(['message'=>'Product Updated Successfully'],200);
    }
  }
  return response()->json(['message'=>'Pls Insert Product Image'],200);
}
}
