<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['as'=>'jwt.'],function(){
    Route::post('register',[
        'as'=>'register',
        'uses'=>'JWTAuthController@register',
    ]);
    Route::post('login',[
       'as'=>'login',
       'uses'=>'JWTAuthController@login' 
    ]);
    //login 상태
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', [
            'as'=>'uses',
            'uses'=>'JWTAuthController@user']);
        Route::get('refresh', [
            'as'=>'refresh',
            'uses'=>'JWTAuthController@refresh']);
        Route::get('logout', [
            'as'=>'logout',
            'uses'=>'JWTAuthController@logout']);
    });
    Route::get('login/hiworks', 'LoginController@redirectToProvider');
    Route::get('hiworks/callback', 'LoginController@handleProviderCallback');

    //허가가 없는 상태
    Route::get('unauthorized', function() {
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized'
        ], 401);
    })->name('unauthorized');

});
