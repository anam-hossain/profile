<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Api\UsersController@store')->name('api.users.store');

Route::get('users/{user}', 'Api\UsersController@show')->name('api.users.show');
Route::put('users/{user}', 'Api\UsersController@update')->name('api.users.update');