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
    Route::post('user/update/{id}', 'UserController@update')->name('user.update');
    Route::resource('user', 'UserController')->except([
        'destroy',
        'update',
    ]);

     // route category
     Route::get('category/datatable', 'CategoryController@datatable')->name('category.datatable');
     Route::get('category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
     Route::post('category/update/{id}', 'CategoryController@update')->name('category.update');
     Route::resource('category', 'CategoryController')->except([
         'destroy',
         'update',
     ]);
    
     // route product
     Route::get('product/datatable', 'ProductController@datatable')->name('product.datatable');
     Route::get('product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
     Route::post('product/update/{id}', 'ProductController@update')->name('product.update');
     Route::resource('product', 'ProductController')->except([
         'destroy',
         'update',
     ]);
});