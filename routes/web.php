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

Route::get('/', 'PagesController@getHome')->name('index');

Route::get('/contact', 'PagesController@getContact')->name('contact');

Route::get('/about', 'PagesController@getAbout')->name('about');

Route::get('/contact/messages', 'ContactController@getMessages')->name('get-messages');

Route::post('/contact/submit', 'ContactController@submit')->name('contact-form-submit');

Route::resource('todo', 'TodoController');

Route::resource('listings', 'ListingsController');

Route::get('/photoshow', 'AlbumsController@index')->name('photoshow-index');
Route::get('/photoshow/albums', 'AlbumsController@index');
Route::get('/photoshow/albums/create', 'AlbumsController@create')->name('album-create');
Route::post('/photoshow/albums/store', 'AlbumsController@store')->name('album-store');
Route::get('/photoshow/albums/{id}', 'AlbumsController@show')->name('album-show');

Route::get('/photoshow/photos/create/{albumId}', 'PhotosController@create')->name('photo-create');
Route::post('/photoshow/photos/store', 'PhotosController@store')->name('photo-store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
