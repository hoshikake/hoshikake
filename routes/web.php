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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware('auth:client')->group(function () {

    Route::get('edit', 'UserController@edit')->name('edit');
    Route::put('/{user}', 'UserController@update')->name('update');
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->where('provider', 'github');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('provider', 'github');

    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController', ['except' => ['index', 'create', 'show', 'sotre']]);
    Route::get('/comments/{post}', 'CommentController@index')->name('comments.index');
    Route::post('/comments/{post}', 'CommentController@store')->name('comments.store');
});
