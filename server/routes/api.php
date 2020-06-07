<?php

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

Route::group(['as' => 'api.'], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'HomeController@index',
    ]);
    //category
    // Route::get('category/{category_id}/posts', [
    //     'as' => 'category.index',
    //     'uses' => 'CategoriesController@index'
    // ]);
    //post
    Route::get('posts/{post_id}', [
        'as' => 'posts.show',
        'uses' => 'PostsController@show'
    ]);
    Route::post('posts', [
        'as' => 'posts.store',
        'uses' => 'PostsController@store'
    ]);
    Route::put('posts/{post_id}', [
        'as' => 'posts.update',
        'uses' => 'PostsController@update'
    ]);
    Route::delete('posts/{post_id}', [
        'as' => 'posts.delete',
        'uses' => 'PostsController@destroy'
    ]);
    // //comments
    // Route::get('comments/{comment_id}', [
    //     'as' => 'comments.show',
    //     'uses' => 'CommentsController@show'
    // ]);
    // Route::put('comments/{comment_id}', [
    //     'as' => 'comments.update',
    //     'uses' => 'CommentsController@update'
    // ]);
    // Route::delete('comments/{comment_id}', [
    //     'as' => 'comments.delete',
    //     'uses' => 'CommentsController@destroy'
    // ]);
    // Route::post('posts/{posts_id}/comments/{comment_id}', [
    //     'as' => 'posts.comments.store',
    //     'uses' => 'PostsController@store'
    // ]);
});
