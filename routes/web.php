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

Route::get('/tshirt', 'AppController@tshirt')->name('front.tshirt');
Route::get('/jacket', 'AppController@jacket')->name('front.jacket');
Route::get('/jersey', 'AppController@jersey')->name('front.jersey');