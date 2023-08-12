<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopdetailController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ShopImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
    
});