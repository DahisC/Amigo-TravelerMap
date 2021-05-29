<?php

// use view;

use App\Http\Controllers\ItinerarieController;
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
Route::resource('/maps', 'MapController');


//個人頁面
Route::prefix('/travelers')->group(function () {
    Route::get('/', 'AmigoController@create')->name('traveler.index');
    Route::get('/profile', 'AmigoController@create')->name('traveler.profile');
    // Route::get('/maps', 'AmigoController@index')->name('traveler.maps');
    //商人
    Route::resource('/attractions', 'AttractionController')->except('show');
});

//我關注的地點
// Route::view('/itineraries', 'itineraries.index')->name('itineraries.index');
Route::resource('/itineraries', 'ItinerarieController')->only(['index', 'store']);

//後台
Route::prefix('/admin')->group(function () {
    Route::get('/', 'AmigoController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
