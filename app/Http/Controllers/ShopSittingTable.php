<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ShopSittingTable extends Controller
{
    public function getTables(Request $request){
        try {
            $result = DB::table('shopsittingtable')->where('shopID',$request->shopID)->get();
            return response()->json(['message'=>'Tables','data'=>$result],200); 
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function createTable(Request $request){
        try {
            $result = DB::table('shopsittingtable')->
            insert(['table_name'=>$request->tableName,'table_type'=>$request->tableType,
            'total'=>$request->tableTotal,'booked'=>$request->tableBooked,'shopID'=>$request->shopID]);
            return response()->json(['message'=>'Table Created Successfully'],200); 
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function confirmTableInventory(Request $request){
        try {
            DB::table('shopsittingtable')->where('id',$request->tableID)->update(['booked'=>0,'total'=>0,'currentOrder'=>0]);
            return response()->json(['message'=>'Confirm Updated'],200); 
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function deleteTable(Request $request){

    }
}
