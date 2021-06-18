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
        $this->registerPolicies($gate);
        
        // 註冊任何認證或授權的服務
        $gate->define('Admin', function ($user) {
            return $user->role === "Admin";
        });
        $gate->define('Guider', function ($user) {
            return $user->role === "Guider";
        });
        $gate->define('Traveler', function ($user) {
            return $user->role === "Traveler";
        });

        $gate->define('Auth', function ($user) {
            return $user->role === "Admin" | $user->role === "Guider" | $user->role === "Traveler";
        });

    }
}
