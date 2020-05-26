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

Route::group(['domain'=>config('project.api_domain'),'prefix'=>'api','namespace'=>'Api','as'=>'api.'], function(){
    Route::get('/',[
        'as'=>'index',
        'uses'=>'HomeController@index',
    ]);
    Route::resource('category.posts', 'PostsController',[
        'only'=>['index']
    ]);
    Route::resource('posts', 'PostsController');
    Route::resource('posts.content','ContentController',[
        'only'=>['index']
    ]);
    Route::resource('comments', 'CommentsController',[
        'only'=>['show','update','destroy']
    ]);
    Route::resource('posts.comments', 'PostsController',[
        'only'=>['index','store']
    ]);
});
