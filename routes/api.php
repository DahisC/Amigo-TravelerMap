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
Route::name('api.')->group(function () {
    // 請求附近的景點
    Route::apiResource('/attractions', 'API\AttractionController')->only(['index']);
    // 收藏的地點
    Route::apiResource('/favorites', 'API\UserAttractionController');
    // 地圖上加入感興趣的地點
    Route::apiResource('/map', 'API\MapAttractionController')->only(['update', 'destroy']);
});
