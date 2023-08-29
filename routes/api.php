<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopdetailController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ShopImageController;
use App\Http\Controllers\ShopProduct;
use App\Http\Controllers\ShopSittingTable;
use App\Http\Controllers\orders;
use App\Http\Controllers\Inventries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Menu;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
Route::post('upload-images', [ShopImageController::class,'uploadImage']);
Route::get('get-images/{shopID}', [ShopImageController::class,'getImage']);
Route::group(['middleware' => 'api'], function () {
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    Route::get('getShopDetails/{userID}', [ShopdetailController::class,'getShopDetails']);
    Route::post('addShopDetails', [ShopdetailController::class,'addShopDetails']);
    Route::post('addUserProfile', [UserProfileController::class,'addUserProfile']);
    Route::get('getUserDetails/{id}', [UserProfileController::class,'getUserDetails']);
    Route::post('productAdding', [ShopProduct::class,'productAdding']);
    Route::get('getShopProducts/{user_ID}', [ShopProduct::class,'getShopProducts']);
    Route::post('createTable', [ShopSittingTable::class,'createTable']);
    Route::post('getTables', [ShopSittingTable::class,'getTables']);
    Route::post('getMenuItems', [Menu::class,'getMenuItems']);
    Route::post('saveOrderTableInventries', [orders::class,'saveOrderTableInventries']);
    Route::post('getInventriesByTableidAPI', [Inventries::class,'getInventriesByTableidAPI']);
    Route::post('confirmTableInventory', [ShopSittingTable::class,'confirmTableInventory']);
    Route::post('setCategories', [Menu::class,'setCategories']);
    Route::post('getCategories', [Menu::class,'getCategories']);
    Route::post('deleteCategories', [Menu::class,'deleteCategories']);
    
});