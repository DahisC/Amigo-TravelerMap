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


//用來測試 Route::pattern('id', '[0-9]+')
//都確認完就可以刪除了
Route::get('/user/{id?}', function ($id = 2) {
    return 'hey' . $id;
})->name('user.show');

//主頁
Route::view('/', 'index')->name('homepage');

// 地圖
Route::resource('/maps', 'MapController');

// 登入
Route::view('/sign-in', 'sign-in')->name('sign-in');
//註冊
Route::view('/sign-up', 'sign-up')->name('sign-up');

// 個人頁面
//as 是name
Route::group([
    'prefix' => 'travelers',
    'as' => 'traveler.'
], function () {
    Route::get('/', 'AmigoController@create')->name('index');
    Route::get('/profile', 'AmigoController@create')->name('profile');
    Route::get('/maps', 'AmigoController@index')->name('maps');
    //商人
    Route::resource('/attractions', 'AttractionController')->except('show');
});



// 我關注的地點
// Route::view('/itineraries', 'itineraries.index')->name('itineraries.index');
Route::resource('/itineraries', 'ItinerarieController')->only(['index', 'store']);

// 後台
Route::group([
    'prefix' => 'backstage',
    'as' => 'backstage.',
    'middleware' => 'auth'
], function () {
    Route::view('/', 'backstage.index')->name('backstage');
    Route::resource('/maps', 'Backstage\MapController');
});

// 前端測試用路由
Route::view('/snow', 'Snow.test');
Route::view('/allen', 'Allen.test');

// 會員模組
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
