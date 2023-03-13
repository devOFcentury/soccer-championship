<?php

namespace App\Providers;

use App\Models\Championnat;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;


class ChampionnatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer('partials.championnat-navigation', function (View $view) {
            $view->with('championnats', Championnat::all());
        });
    }
}
