<?php

namespace App\Providers;

use App\Tag;
use App\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 在 Production 環境時強制將網頁內使用的網址協定變更為 https
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        view()->composer('partials.maps.search-attraction-modal', function ($view) {
            $view->with('tags', Tag::get());
        });
    }
}
