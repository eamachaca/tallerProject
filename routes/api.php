<?php

use Illuminate\Http\Request;

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

Route::group(['as' => 'api.','namespace'=>'API'], function() {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'GeneralApiController@index'
    ]);
    Route::get('admin', [
        'as' => 'admin',
        'uses' => 'GeneralApiController@admin'
    ]);
    Route::get('user', [
        'as' => 'user',
        'uses' => 'GeneralApiController@user'
    ]);
    Route::get('events', [
        'as' => 'events',
        'uses' => 'GeneralApiController@events'
    ]);


    Route::group(['as' => 'client.','prefix' => 'clients'], function() {
        Route::post('login', [
            'as' => 'login',
            'uses' => 'AuthApiController@loginClient'
        ]);
        Route::post('register', [
            'as' => 'register',
            'uses' => 'AuthApiController@registerClient'
        ]);
        Route::group(['middleware' => 'auth:clients'], function(){
            Route::get('products', [
                'as' => 'products',
                'uses' => 'GeneralApiController@showProducts'
            ]);
        });
    });

    Route::group(['as' => 'dealers.','prefix' => 'dealers'], function() {
        Route::post('login', [
            'as' => 'login',
            'uses' => 'AuthApiController@loginDistributor'
        ]);
        Route::group(['middleware' => 'auth:dealers'], function(){
            Route::post('routes', [
                'as' => 'routes',
                'uses' => 'DealerApiController@getRoute'
            ]);
            Route::get('products', [
                'as' => 'products',
                'uses' => 'GeneralApiController@showProducts'
            ]);
            Route::post('update', [
                'as' => 'update',
                'uses' => 'DealerApiController@updateState'
            ]);
            Route::post('tracking', [
                'as' => 'tracking',
                'uses' => 'DealerApiController@tracking'
            ]);
        });
    });

});