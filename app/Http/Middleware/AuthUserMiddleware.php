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
        $user =  Auth::user();

        //若有資料
        if(!is_null($user)){
            User::where('id','$user_id')->get();
            // dd($user['role']);
            if($user['role'] == "Tourist"){
                return redirect()->back();
            }
            if($user['role'] == "Trader"){
                return redirect()->back();
            }
            if($user['role'] == "Admin"){
                return redirect()->back();
            }
            $is_user = true;
        };

        //若不允許存取，重新導向至首頁
        if(!$is_user){
           return  redirect()->route('login');
        };
        return $next($request);
    }
}
