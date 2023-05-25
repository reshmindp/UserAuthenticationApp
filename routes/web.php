<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\User\UserController@register_page');

Route::group(['prefix'=>'user',  'as'=>'user.'], function()
{
    Route::get('login', 'App\Http\Controllers\User\LoginController@login_page')->name('login.page');

    Route::post('register', 'App\Http\Controllers\User\UserController@registration')->name('register');


});
