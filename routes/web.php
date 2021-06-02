<?php

// use view;

use App\Http\Controllers\BackstageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItinerarieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// 地圖
// ?search=
Route::resource('/maps', 'MapController');

// 登入與註冊
Route::view('/sign-in', 'sign-in')->name('sign-in');
Route::view('/sign-up', 'sign-up')->name('sign-up');

// 個人頁面
Route::prefix('/travelers')->group(function () {
    Route::get('/', 'AmigoController@create')->name('traveler.index');
    Route::get('/profile', 'AmigoController@create')->name('traveler.profile');
    // Route::get('/maps', 'AmigoController@index')->name('traveler.maps');
    //商人
    Route::resource('/attractions', 'AttractionController')->except('show');

    //middleware測試用
    Route::get('/user/traveler', 'AmigoController@traveler')->middleware(['auth.user']);
    Route::get('/user/trader', 'AmigoController@trader')->middleware(['auth.user']);
    Route::get('/user/admin', 'AmigoController@admin')->middleware(['auth.user']);
    //秘密通道
});
Route::get('/daniel', 'AmigoController@admin')->middleware('auth.basic');

// 我關注的地點
// Route::view('/itineraries', 'itineraries.index')->name('itineraries.index');
Route::resource('/itineraries', 'ItinerarieController')->only(['index', 'store']);

// 後台
Route::prefix('/backstage')->group(function () {
    Route::resource('/', 'Backstage/MapController');
    Route::view('/maps', 'backstage.index');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
