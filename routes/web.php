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

// User Auth routes
Auth::routes();

// Pages Controller routes
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/portfolio', 'PagesController@portfolio');
Route::get('/dashboard', 'PagesController@dashboard')->middleware('auth');

// Posts Controller routes
Route::resource('posts', 'PostsController');

// Comments Controller routes
Route::resource('comments', 'CommentsController');
