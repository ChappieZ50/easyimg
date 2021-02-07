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

/* imgrob front-end */

Route::get('/', 'HomeController@index')->name('home');
Route::post('/upload', function () {
    return [
        'url' => 'https://test.com/test.jpg',
    ];
});
