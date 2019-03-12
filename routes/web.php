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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::prefix('post')->group(function(){
    Route::get('home', 'PostController@index')->name('home');
    Route::get('{slug}', 'PostController@show')->name('post_detail');
});

Route::namespace('Auth')->group(function (){
    Route::get('/login', 'LoginController@loginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function (){
    
    Route::prefix('post')->group(function (){
        Route::get('index', 'PostController@index')->name('post_admin');
        Route::get('create', 'PostController@create')->name('post_create');
        Route::post('store', 'PostController@store')->name('post_store');
        Route::get('update', 'PostController@update')->name('post_update');
    });

});