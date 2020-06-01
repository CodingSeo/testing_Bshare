<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace'=>'Api','as'=>'api.'], function(){
    Route::get('/',[
        'as'=>'index',
        'uses'=>'HomeController@index',
    ]);
    
    Route::resource('category.posts', 'CategoriesController',[
        'only'=>['index']
    ]);
    // Route::get('category/{category_id}/posts',[
    //     'as'=>'category.posts',
    //     'uses'=>'CategoriesController@index'
    // ]);

    Route::resource('posts', 'PostsController',[
        'except'=>['index','edit','create']
    ]);

    Route::resource('comments', 'CommentsController',[
        'only'=>['show','update','destroy']
    ]);
    
    Route::resource('posts.comments', 'PostsController',[
        'only'=>['index','store']
    ]);
});
