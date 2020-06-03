<?php

namespace App\Providers\Bshare;

use App\Http\Controllers\PostsController;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\Request;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $container = app();

        //postscontroller
        $container->when(PostsController::class)->needs(Request::class)->give(PostsRequest::class);
        $container->when(PostsController::class)->needs(Service::class)->give(PostsService::class);


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
