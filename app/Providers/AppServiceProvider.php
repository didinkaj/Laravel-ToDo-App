<?php

namespace taskSystem\Providers;


use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
     public function register()
    {
        //
		require_once __DIR__ . '/../Http/Helpers/Navigation.php';
    }
}
