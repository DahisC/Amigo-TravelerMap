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

// 主頁
Route::view('/', 'index')->name('homepage');

// 透過地圖探索附近地點，或顯示自己的位置

Route::resource('maps', 'MapController');
// 地點 -- 基本的CRUD
// Route::resource('attractions', 'AttractionController')->except(['index', 'show']);

// 登入
Route::view('/sign-in', 'sign-in')->name('sign-in');
// 註冊
Route::view('/sign-up', 'sign-up')->name('sign-up');

// 個人頁面
//as 是 name
// Route::group([
//     'prefix' => 'travelers',
//     'as' => 'travelers.'
// ], function () {
//     Route::get('/', 'AmigoController@create')->name('index');
//     Route::get('/profile', 'AmigoController@create')->name('profile');
//     Route::resource('/maps', 'AmigoController@index');
// });

//商人
//index 主要是顯示使用者建立的地點(活動管理)
//create . edit 是miro原本有的 用於讓妳們測試表單用 (建立編輯/活動)
//這邊跟miro規劃的路徑不一樣，應該是巢狀的我拉出來
//商人的後台 所以應該跟我們後台一樣不用show
// Route::resource('travelers.attractions', 'AmigoController@index')->except('show');


// // 我關注的地點
// Route::resource('/itineraries', 'Backstage\UserController')->only(['index', 'store']);

// 後台商人旅人共用
Route::group([
    'prefix' => 'backstage',
    'as' => 'backstage.',
    'middleware' => 'auth'
], function () {
    //收藏頁面
    Route::view('/', 'backstage.index')->name('index');
    Route::resource('/users', 'Backstage\UserController')->except('show');
    Route::resource('/maps', 'Backstage\MapController')->except('show');
    Route::resource('/attractions', 'Backstage\AttractionController')->except('show');
});

// 前端測試用路由
Route::view('/snow', 'Snow.test');
Route::view('/allen', 'Allen.test');

// 會員模組
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
