<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Inventries extends Controller
{
  public function getInventriesByTableidAPI(Request $request){
        try {
          $currentOrderID = DB::table('shopsittingtable')->where('id',$request->tableID)
          ->value('currentOrder');
          // $orderItemsIDs = DB::table('order_items')->where('orderID',$currentOrderID)->pluck('itemId')->toArray();
          // $Item = DB::table('productshop')->whereIn('id',$orderItemsIDs)->get();
          $specificTableID = $request->tableID;
          $items = DB::table('order_items')
          ->where('orderID', $currentOrderID)
          ->join('productshop', 'order_items.itemId', '=', 'productshop.id')
          ->select(['order_items.qty','order_items.price',
           'productshop.product_name','productshop.id','productshop.price'])
          ->get();
          $customerInfo = DB::table('orders')->where('id',$currentOrderID)->get();
          return response()->json(['Item'=>$items,'table_ID'=>$specificTableID,'customerInfo'=>$customerInfo]);
        } catch (\Throwable $th) {
          //throw $th;
          return response()->json(['error'=>$th],200);
        }
      }
}
