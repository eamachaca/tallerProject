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
Route::group(['prefix' => 'clients'], function() {
    Route::post('login', 'API\AuthAPIController@loginClient');
    Route::post('register', 'API\AuthAPIController@registerClient');
    Route::group(['middleware' => 'auth:clients'], function(){
        Route::post('details', 'API\UserController@details');
    });
});

Route::group(['prefix' => 'dealers'], function() {
    Route::post('login', 'API\AuthAPIController@loginDistributor');

    Route::group(['middleware' => 'auth:dealers'], function(){
        Route::post('details', 'API\UserController@details');
    });
});