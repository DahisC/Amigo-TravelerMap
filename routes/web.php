<?php

// use view;
use App\User;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('/api')->group(function () {
    Route::get('attractions', 'AttractionController@getAttractions')->name('attractions.get');
});


Route::view('/', 'index')->name('homepage'); // 首頁

Route::resource('maps', 'MapController'); // 地圖
Route::resource('attractions', 'AttractionController')->except('create', 'edit'); // 地點
Route::get('favorites', 'FavoriteController@index')->name('favorites.index');
Route::patch('/attractions/{attraction}/favorite', 'AttractionController@favorite')->name('attractions.favorite'); // 收藏地點

Route::view('/sign-in', 'sign-in')->name('sign-in'); // 登入
Route::view('/sign-up', 'sign-up')->name('sign-up'); // 註冊

// 後台（管理員與一般使用者共用，透過 Gate & PostPolicy 區分權限）
Route::group([
    'prefix' => 'backstage',
    'as' => 'backstage.',
    'middleware' => 'auth'
], function () {
    Route::view('/', 'backstage.index')->name('index'); // 後台首頁
    Route::resource('/users', 'Backstage\UserController')->except('show'); // 後台 - 會員管理
    Route::resource('/maps', 'Backstage\MapController')->except('show'); // 後台 - 地圖管理
    Route::resource('/attractions', 'Backstage\AttractionController')->except(['store', 'update', 'show', 'destroy']); // 後台 - 地點管理
});


// 前端測試用路由
Route::view('/snow', 'Snow.test');
Route::view('/allen', 'Allen.test');
Route::get('test',function(){
    $userFavorites = User::with([
        'attractions',
        'attractions.position',
    ])->findOrFail(auth()->user()->id)->attractions;
    // dd($userFavorites);
    return view('emails.show',['attractions'=> $userFavorites]);
});

//PDF
Route::group([
    'prefix'=>'pdf',
    'as'=>'pdf',
],function(){
    Route::get('watch','Backstage\UserController@watch');
    Route::get('output','Backstage\UserController@pdfOutput');
});


// 會員模組
Auth::routes();

//faceBook
Route::get('login/facebook', 'Auth\LoginController@facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@facebookCallback');

//github
Route::get('login/github', 'Auth\LoginController@github');
Route::get('login/github/callback', 'Auth\LoginController@githubCallback');


// Route::get('/home', 'HomeController@index')->name('home');
