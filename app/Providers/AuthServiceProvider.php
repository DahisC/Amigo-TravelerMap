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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
        
        // 註冊類別的方法
        $gate->define('Admin', function ($user) {
            return $user->role === "Admin";
        });
        $gate->define('Guider', function ($user) {
            return $user->role === "Guider";
        });
        $gate->define('Traveler', function ($user) {
            return $user->role === "Traveler";
        });

    }
}
