<?php

namespace App\Providers;

use App\Map;
use App\Tag;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
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

        view()->composer('partials.favorites.btn-pin-to-map', function ($view) {
            $view->with('userMaps', Map::where('user_id', auth()->user()->id)->get());
        });


        //分頁自定義
        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
