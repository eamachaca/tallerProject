<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('_partials.template-admin');
})->name('index');

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::post('login', [
    'as' => 'login-post',
    'uses' => 'Auth\LoginController@login'
]);

Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);

Route::resource('products',ProductController::class)->except('show');
Route::resource('type-products',TypeProductController::class)->except('show');


Route::get('products/{product}/add', [
    'as' => 'products.add',
    'uses' => 'ProductController@add'
]);

Route::post('products/{product}/add', [
    'as' => 'products.stock',
    'uses' => 'ProductController@stock'
]);