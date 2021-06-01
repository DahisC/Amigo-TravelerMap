<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Attractions;
use Illuminate\Support\Facades\Auth;

class AuthUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //從資料庫中撈資料
    public function handle($request, Closure $next)
    {
        //全部拒絕存取
        $is_user = false;
        
        // 取得目前已認證使用者-兩種方法
        // $request->user()
        // Auth::user();
        //從驗證過的資料中撈資料
        $user =  Auth::user();
     
        //若有資料
        if(!is_null($user)){
            User::where('id','$user_id')->get();
            // dd($user['role']);
            if($user['role'] == "Trader\r\n"){
                dd("Trader");
            }
            if($user['role'] == "Traveler"){
                dd("Traveler");
            }
            if($user['role'] == "Admin"){
                dd("Admin");
            }
        };

        //若不允許存取，重新導向至首頁
        if(!$is_user){
            redirect('/');};
        return $next($request);
    }
}
