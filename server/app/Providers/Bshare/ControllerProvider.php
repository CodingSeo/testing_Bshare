<?php

namespace App\Providers\Bshare;

use Illuminate\Support\ServiceProvider;

class ControllerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $container = app();
        $container->when()
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
