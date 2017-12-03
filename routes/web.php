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

Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@store')->name('login.store');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'UsersController@create')->name('users.create');
Route::get('users/{user}', 'UsersController@show')->name('users.show');
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::post('users/photos', 'Users\PhotosController@store')->name('users.photos.store');

Route::get('verifications/{user}/{verificationCode}', 'Auth\VerificationController@verify')->name('verify');

// Auth::routes();
