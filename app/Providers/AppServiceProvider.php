<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
<<<<<<< HEAD
        Paginator::useBootstrap();
=======
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
>>>>>>> cab010db7f31ac2c7b4ed50fbb538e6b846b50fc
    }
}
