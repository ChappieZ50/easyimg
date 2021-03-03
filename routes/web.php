<?php

use Illuminate\Support\Facades\Route;

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


/* imgrob admin */
Route::group(['prefix' => '/admin/', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin-auth'], function () {
    Route::get('', 'HomeController@index')->name('home');
    Route::group(['namespace' => 'User'], function () {
        Route::resource('user', 'UserController')->only('index', 'show');
        Route::post('users/status', 'UserController@status')->name('user.status');
        Route::post('users/store', 'UserController@store')->name('user.store');
    });
    Route::resource('file', 'FileController')->only('index', 'show');
    Route::resource('page', 'PageController')->except('show');
    Route::resource('message', 'MessageController')->except('create', 'edit');

    /* Website Settings */
    Route::resource('setting', 'SettingController')->only('index', 'store');
});

/* imgrob web */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/p/{slug}', 'HomeController@page')->name('page');
Route::resource('message', 'MessageController')->only('store');

Route::group(['as' => 'user.', 'namespace' => 'User', 'middleware' => 'user-status'], function () {
    Route::resource('login', 'LoginController')->only('index', 'store')->middleware('guest');
    Route::resource('register', 'RegisterController')->only('index', 'store')->middleware('guest');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
        Route::get('/', function () {
            return redirect()->route('user.profile');
        });
        Route::get('profile', 'UserController@profile')->name('profile');
        Route::put('profile/update', 'UserController@update')->name('update');
        Route::put('profile/update/password', 'UserController@updatePassword')->name('update.password');
        Route::put('profile/update/avatar', 'UserController@updateAvatar')->name('update.avatar');
        Route::delete('profile/destroy/avatar', 'UserController@destroyAvatar')->name('destroy.avatar');

        Route::get('my-files', 'UserController@userImages')->name('images');
        Route::delete('my-files/destroy/{file}', 'UserController@destroyFile')->name('file.destroy');
    });
});

Route::post('file/store', 'FileController@store')->name('file.store');
