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
        Route::get('show/{id}', 'PostController@show')->name('post_show');
        Route::post('store', 'PostController@store')->name('post_store');
        Route::post('update/{id}', 'PostController@update')->name('post_update');
        Route::post('delete/{id}', 'PostController@delete')->name('post_delete');
    });
    Route::prefix('tag')->group(function (){
        Route::get('/', 'TagController@index')->name('tag_admin');
        Route::get('create', 'TagController@create')->name('tag_create');
        //Route::get('show/{id}', 'TagController@show')->name('tag_show');
        Route::get('{id}', 'TagController@show');
        Route::get('edit/{id}', 'TagController@edit');
        Route::post('store', 'TagController@store')->name('tag_store');
        Route::post('update/{id}', 'TagController@update')->name('tag_update');
        Route::get('delete/{id}', 'TagController@delete')->name('tag_delete');
    });
    
    
    Route::prefix('upload')->group(function (){
        Route::get('/', 'UploadController@index');
        Route::post('file', 'UploadController@uploadFile');
        Route::delete('file', 'UploadController@deleteFile');
        Route::post('folder', 'UploadController@createFolder');
        Route::delete('folder', 'UploadController@deleteFolder');
    });
        

});