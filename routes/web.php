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

Route::get('/', 'AppController@home')->name('front.home');
Route::get('/about', 'AppController@about')->name('front.about');
Route::get('/contact', 'AppController@contact')->name('front.contact');

Route::prefix('admin')->namespace("admin")->name('admin.')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // route user
    Route::get('user/datatable', 'UserController@datatable')->name('user.datatable');
    Route::get('user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
    Route::resource('user', 'UserController')->except([
        'destroy'
    ]);
});