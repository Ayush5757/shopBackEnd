<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class orders extends Controller
{
  public function saveOrderTableInventries(Request $request){
    try {
      $Order_ID = DB::table('orders')->insertGetId(['tableID'=>$request->orders['items'][0]['tableID'],
      'customerName'=>$request->orders['info']['customerName'],'customerPhone'=>$request->orders['info']['customerPhone'],
      'customerAddress'=>$request->orders['info']['customerAddress'],'customerNotes'=>$request->orders['notes']]);
      
      DB::table('shopsittingtable')->where('id',$request->orders['items'][0]['tableID'])
      ->update(['currentOrder'=>$Order_ID]);
      $allItems=[];
      foreach($request->orders['items'] as $Items){
        $Items['orderID'] = $Order_ID;  
        unset($Items['tableID']);
        $allItems[] = $Items;
      }
      DB::table('order_items')->insert($allItems);
      // Table Status Update.
      DB::table('shopsittingtable')->where('id',$request->orders['items'][0]['tableID'])->update(['booked'=>1,'total'=>$request->orders['totalAmount']]);
      
      return response()->json(['message'=>'Order Placed','allItems'=>$allItems],200);
    } catch (\Throwable $th) {
      //throw $th;
      return response()->json(['error'=>$th],200);
    }
  }
}
