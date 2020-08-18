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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('','UserController@index')->name('index');
        Route::get('{user}/edit','UserController@edit')->name('edit');
        Route::put('{user}','UserController@update')->name('update');
        Route::get('{user}','UserController@destroy')->name('destroy');
    });
});
