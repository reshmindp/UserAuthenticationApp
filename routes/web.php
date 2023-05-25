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
    Route::post('login-info', 'App\Http\Controllers\User\LoginController@getlogin_info')->name('getlogin.info');
    Route::post('qr-download', 'App\Http\Controllers\User\LoginController@download_qrcode')->name('qrcode.download');

    Route::post('register', 'App\Http\Controllers\User\UserController@registration')->name('register');
    Route::get('user-list', 'App\Http\Controllers\User\UserController@list_all_users')->name('list.all');


    Route::get('show-info', 'App\Http\Controllers\User\ProfileController@show_info')->name('show');
    Route::post('update-profile-image', 'App\Http\Controllers\User\ProfileController@update_profile_image')->name('update.profileimage');
    Route::post('update-profile', 'App\Http\Controllers\User\ProfileController@update_profile')->name('update.profile');


});
