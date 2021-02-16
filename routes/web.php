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
Route::group(['prefix' => '/admin/', 'as' => 'admin.'], function () {
    Route::get('', 'Admin\HomeController@index')->name('home');
});

/* imgrob web */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/p', 'PageController@index')->name('page');
Route::get('/login', 'LoginController@login')->name('login');
Route::get('/register', 'LoginController@register')->name('register');

Route::group(['prefix' => '/user/', 'as' => 'user.'], function () {

    Route::get('/', function () {
        return redirect()->route('user.profile');
    });

    Route::get('profile', 'UserController@profile')->name('profile');
    Route::get('my-images', 'UserController@userImages')->name('images');
});

Route::post('/upload', function () {
    return [
        'url' => 'https://test.com/test.jpg',
    ];
});
