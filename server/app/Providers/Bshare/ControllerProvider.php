<?php

namespace App\Providers\Bshare;

use App\Http\Controllers\HomeController;
use Illuminate\Support\ServiceProvider;
use App\Http\Requests\BshareRequest;

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
        //homecontroller
        // $container->when(HomeController::Class)->needs(Tra)
        //postscontroller
        // $container->when(PostsController::class)->needs(BshareRequest::class)->give(PostsRequest::class);
        // $container->when(PostsController::class)->needs(Service::class)->give(PostsService::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $container = app();
    }
}
