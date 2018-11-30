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

// User Auth routes - This function prefixes /admin/ 
Route::group(['prefix' => 'admin'], function () {
  Auth::routes();
});

// Pages Controller routes
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/portfolio', 'PagesController@portfolio')->name('portfolio');
Route::get('/admin/dashboard', 'PagesController@dashboard')->middleware('auth')->name('dashboard');

// Posts Controller routes
Route::resource('posts', 'PostsController');

// Comments Controller routes
Route::resource('comments', 'CommentsController');
