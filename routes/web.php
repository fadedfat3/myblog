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
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('{id}', 'HomeController@show')->name('post.show');
    Route::post('thumbs', 'HomeController@addThumbs');
});

Route::namespace('Auth')->group(function (){
    Route::get('/login', 'LoginController@loginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function (){
    
    Route::prefix('post')->group(function (){
        Route::get('/', 'PostController@index')->name('post.index');
        Route::get('create', 'PostController@create')->name('post.create');
        //Route::get('{id}', 'PostController@show')->name('post_show');
        Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('store', 'PostController@store')->name('post.store');
        Route::post('update/{id}', 'PostController@update')->name('post.update');
        Route::get('delete/{id}', 'PostController@destroy')->name('post.destroy');
    });
    Route::prefix('tag')->group(function (){
        Route::get('/', 'TagController@index')->name('tag_admin');
        Route::get('create', 'TagController@create')->name('tag_create');
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