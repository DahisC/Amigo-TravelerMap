<?php

// use view;
use Illuminate\Support\Facades\Route;

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

//地圖
//?search=
Route::get('/maps', 'AmigoController@index')->name('map.index');

//註冊登入
Route::prefix('/sign-in')->group(function () {
    Route::get('/', 'AmigoController@index')->name('sign-in.get');
    Route::post('/', 'AmigoController@index')->name('sign-in.post');
});

Route::prefix('/sign-up')->group(function () {
    Route::get('/', 'AmigoController@index')->name('sign-up.get');
    Route::post('/', 'AmigoController@index')->name('sign-up.post');
});

//個人頁面
Route::prefix('/travelers/{id}')->group(function () {
    Route::get('/', 'AmigoController@create')->name('travelers.index');
    Route::get('/profile', 'AmigoController@create')->name('travelers.profile');
    Route::get('/maps', 'AmigoController@index')->name('travelers.maps');
    //商人
    Route::resource('/attractions', 'AmigoController@index')->except('show');
});

//我關注的地點
Route::get('/itineraries', 'AmigoController@index')->name('itineraries.index');

//後台
Route::prefix('/admin')->group(function () {
    Route::get('/', 'AmigoController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
