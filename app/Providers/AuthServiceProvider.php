<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 註冊 POLICY
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Map::class => MapPolicy::class,
        Attraction::class => AttractionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        // 攔截檢查
        Gate::before(function($user,$ability){
            if($user->role === "Admin" ){
                return true;
            };
        });

        // 定義授權規則 -- 在這裡呼叫Auth靜態介面的方法
        $this->registerPolicies($gate);
        
        Gate::resource('map', 'App\Policies\MapPolicy');
        // Gate::resource('attraction', 'App\Policies\AttractionPolicy');
        Gate::resource('attraction', 'App\\AttractionPosition');

        Gate::define('view-admin', function ($user) {
            return $user->role === "Admin" ;
        });
        Gate::define('view-guider', function ($user) {
            return $user->role === "Guider";
        });


        Gate::define('view-traveler', function ($user) {
            return $user->role === "Traveler";
        });
        Gate::define('view-auth', function ($user) {
            return $user->role === "Guider" | $user->role === "Traveler";
        });
    }
}
