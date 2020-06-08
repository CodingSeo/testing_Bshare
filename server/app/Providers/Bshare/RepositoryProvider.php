<?php

namespace App\Providers\Bshare;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $container = app();
        $container->when(PostsController::class)->needs(ApiRequest::class)->give(PostsRequest::class);
        $container->when(PostsController::class)->needs(ApiRequest::class)->give(PostsRequest::class);
        $container->when(PostsController::class)->needs(ApiRequest::class)->give(PostsRequest::class);
        $container->when(PostsController::class)->needs(ApiRequest::class)->give(PostsRequest::class);
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
