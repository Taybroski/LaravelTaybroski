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
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/portfolio', 'PagesController@portfolio')->name('portfolio');
Route::get('/admin/dashboard', 'PagesController@dashboard')->middleware('auth')->name('dashboard');

// Posts Controller routes
Route::resource('posts', 'PostsController'); 
// Route::get('/posts/{slug}/delete', 'PostsController@destroy')->name('posts.destroy');

// Route::get('/posts', 'PostsController@index')->name('posts.index');
// Route::get('/posts/{slug}', 'PostsController@show')->name('posts.show');
// Route::get('/posts/create', 'PostsController@create')->name('posts.create');
// Route::post('/posts/{id}', 'PostsController@store')->name('posts.store');
// Route::post('/posts/{slug}/edit', 'PostsController@edit')->name('posts.edit');

// Comments Controller routes
Route::resource('comments', 'CommentsController');
