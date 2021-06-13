<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//如果取attraction他會先連外面的controller 我才加api
Route::name('api')->group(function(){
   Route::apiResource('/attractions','API\AttractionController');
   Route::apiResource('/userAttractions','API\UserAttractionController');
   Route::apiResource('/mapAttractions','API\MapAttractionController');
});


