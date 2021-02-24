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
        Route::get('users', 'UserController@index')->name('users');
        Route::post('users/status', 'UserController@status')->name('user.status');
        Route::post('users/store', 'UserController@store')->name('user.store');
    });
});

/* imgrob web */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/p', 'PageController@index')->name('page');

Route::group(['as' => 'user.', 'namespace' => 'User', 'middleware' => 'user-status'], function () {
    Route::resource('login', 'LoginController')->only('index', 'store')->middleware('guest');
    Route::resource('register', 'RegisterController')->only('index', 'store')->middleware('guest');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
        Route::get('/', function () {
            return redirect()->route('user.profile');
        });
        Route::get('profile', 'UserController@profile')->name('profile');
        Route::get('my-images', 'UserController@userImages')->name('images');
    });
});

Route::post('/upload', function () {
    return [
        'url' => 'https://test.com/test.jpg',
    ];
});
