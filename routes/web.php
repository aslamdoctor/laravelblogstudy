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

Route::redirect('/', "/posts");

Route::get('/posts', 'PostsController@index')->name('postList');
Route::get('/posts/create', 'PostsController@create')->name('postCreate');
Route::post('/posts/store', 'PostsController@store')->name('postStore');
Route::get('/posts/show/{id}', 'PostsController@show')->name('postShow');
Route::get('/posts/edit/{id}', 'PostsController@edit')->name('postEdit');
Route::put('/posts/update/{id}', 'PostsController@update')->name('postUpdate');
Route::delete('/posts/delete/{id}', 'PostsController@destroy')->name('postDelete');
