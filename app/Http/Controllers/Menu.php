<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Menu extends Controller
{
    public function getMenuItems(Request $request){
        try {
            $result = DB::table('productshop')->where('user_ID',$request->shopID)->where('categorie',$request->categoryID)->get();
            return response()->json(['message'=>'Menu','data'=>$result],200); 
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function setCategories(Request $request){
        try {
            DB::table('categories')->insert(['shopID'=>$request->shopID,'name'=>$request->name]);
            return response()->json(['message'=>'Categories Created','name'=>$request->name],200); 
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function getCategories(Request $request){
        try {
            $result = DB::table('categories')->where('shopID',$request->shopID)->get();
            return response()->json(['message'=>'Categories Created','data'=>$result],200); 
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function deleteCategories(Request $request){
        try {
            $result = DB::table('categories')->where('id',$request->categoryID)->delete();
            return response()->json(['message'=>'Categories Deleted Successfully'],200); 
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
