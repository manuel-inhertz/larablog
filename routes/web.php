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

Auth::routes();

Route::get('/', 'FrontEndController@index')->name('frontend');

// Admin routes 
Route::get('/admin', 'HomeController@index')->name('admin');

// Posts backend routes
Route::get('/post/create', 'PostsController@create')->name('post.create');

Route::post('/post', 'PostsController@store')->name('post');

Route::get('/post/{alias}', 'PostsController@show')->name('post.show');

Route::get('/post/{alias}/edit', 'PostsController@edit')->name('post.edit');

Route::patch('/post/{alias}', 'PostsController@update')->name('post.update');

Route::delete('/post/{alias}', 'PostsController@destroy')->name('post.delete');

Route::get('/posts', 'PostsController@index')->name('post.index');

// Users routes
Route::resource('user', 'UsersController');

// Pages routes
Route::resource('page', 'PagesController');