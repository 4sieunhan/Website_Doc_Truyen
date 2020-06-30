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

Route::get('/home',['as'=>'home',function(){
    return view('admin.master');
}]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('list','CategoryController@list')->name('list');
        Route::get('create','CategoryController@create')->name('create');
        Route::post('store','CategoryController@store')->name('store');
        Route::get('edit/{id}','CategoryController@edit')->name('edit');
        Route::post('update/{id}','CategoryController@update')->name('update');
        Route::get('destroy/{id}','CategoryController@destroy')->name('destroy');
    });
    Route::prefix('author')->name('author.')->group(function(){
        Route::get('list','AuthorController@list')->name('list');
        Route::get('create','AuthorController@create')->name('create');
        Route::post('store','AuthorController@store')->name('store');
        Route::get('edit/{id}','AuthorController@edit')->name('edit');
        Route::post('update/{id}','AuthorController@update')->name('update');
        Route::get('destroy/{id}','AuthorController@destroy')->name('destroy');
    });
    Route::prefix('story')->name('story.')->group(function(){
        Route::get('list','StoryController@list')->name('list');
        Route::get('create','StoryController@create')->name('create');
        Route::post('store','StoryController@store')->name('store');
        Route::get('edit/{id}','StoryController@edit')->name('edit');
        Route::post('update/{id}','StoryController@update')->name('update');
        Route::get('destroy/{id}','StoryController@destroy')->name('destroy');
    });
});

Route::get('/create',function(){
    return view('admin.story.create');
});
