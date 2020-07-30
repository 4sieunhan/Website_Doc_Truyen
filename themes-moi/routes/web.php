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
Route::namespace('Login')->group(function(){
    Route::get('dangnhap','LoginController@dangnhap')->name('dangnhap');
    Route::post('dangnhap','LoginController@dangnhapvao')->name('dangnhapvao');
    Route::get('dangky','LoginController@dangky')->name('dangky');
    Route::post('dangky','LoginController@dangkyvao')->name('dangkyvao');
    Route::get('dangxuat','LoginController@dangxuat')->name('dangxuat');
});

Route::middleware('check_in')->namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('home','HomeController@index')->name('home');
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('thongtincanhan','ProfileController@index')->name('index');
        Route::post('store','ProfileController@profile_settings')->name('profile-settings');
    });
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('list','CategoryController@list')->name('list');
        Route::get('create','CategoryController@create')->name('create');
        Route::post('store','CategoryController@store')->name('store');
        Route::get('edit/{id}','CategoryController@edit')->name('edit');
        Route::post('update/{id}','CategoryController@update')->name('update');
        Route::get('delete/{id}','CategoryController@destroy')->name('destroy');
    });
    Route::prefix('author')->name('author.')->group(function(){
        Route::get('list','AuthorController@list')->name('list');
        Route::get('create','AuthorController@create')->name('create');
        Route::post('store','AuthorController@store')->name('store');
        Route::get('edit/{id}','AuthorController@edit')->name('edit');
        Route::post('update/{id}','AuthorController@update')->name('update');
        Route::get('delete/{id}','AuthorController@destroy')->name('destroy');
    });
    Route::prefix('story')->name('story.')->group(function(){
        Route::get('show','StoryController@show')->name('show');
        Route::get('list','StoryController@list')->name('list');
        Route::get('create','StoryController@create')->name('create');
        Route::post('store','StoryController@store')->name('store');
        Route::get('edit/{id}','StoryController@edit')->name('edit');
        Route::post('update/{id}','StoryController@update')->name('update');
        Route::get('delete/{id}','StoryController@destroy')->name('destroy');

        Route::prefix('chapter')->name('chapter.')->group(function(){
            Route::get('show','ChapterController@show')->name('show');
            Route::get('list/{id}','ChapterController@list')->name('list');
            Route::get('create/{id}','ChapterController@create')->name('create');
            Route::post('store/{id}','ChapterController@store')->name('store');
            Route::get('edit/{id}','ChapterController@edit')->name('edit');
            Route::post('update/{id}','ChapterController@update')->name('update');
            Route::get('delete/{id}','ChapterController@destroy')->name('destroy');
        });
    });
});

Route::middleware('check_in')->group(function(){
    Route::any('{all?}','Admin\HomeController@index')->where('all','(.*)');
});
