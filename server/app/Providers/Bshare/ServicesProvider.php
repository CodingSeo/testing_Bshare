<?php

namespace App\Providers\Bshare;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\PostsController;
use App\Services\Implement\CategoryServiceImp;
use App\Services\Implement\CommentServiceImp;
use App\Services\Implement\PostServiceImp;
use App\Services\Implement\UserServiceImp;
use App\Services\Interfaces\CategoryService;
use App\Services\Interfaces\CommentService;
use App\Services\Interfaces\PostService;
use App\Services\Interfaces\UserService;
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

        //binding careful
        $container->bind(DTO::class,EloquentDTO::class);

        $container->when(PostsController::class)->needs(PostService::class)->give(PostServiceImp::class);

        $container->when(JWTAuthController::class)->needs(UserService::class)->give(UserServiceImp::class);

        $container->when(CommentsController::class)->needs(CommentService::class)->give(CommentServiceImp::class);

        $container->when(CategoriesController::class)->needs(CategoryService::class)->give(CategoryServiceImp::class);
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
