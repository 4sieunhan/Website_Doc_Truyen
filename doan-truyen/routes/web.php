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

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/home','AdminController@index')->name('home');
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('thongtincanhan','ProfileController@index')->name('index');
        Route::post('update-profile','ProfileController@profile_settings')->name('profile-settings');
        Route::post('update-password','ProfileController@profile_change_password')->name('profile-change-password');
        Route::post('update-avatar','ProfileController@update_avatar')->name('update-avatar');
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

Route::namespace('Auth')->group(function(){
    Route::get('/dangnhap','LoginController@showLoginForm')->name('login');
    Route::post('/dangnhap','LoginController@login')->name('login.submit');

    Route::get('/dangxuat','LoginController@logout')->name('logout');
    Route::get('/dangxuat','LoginController@userLogout')->name('user.logout');

    Route::get('/dangky','RegisterController@showRegisterForm')->name('register');
    Route::post('/dangky','RegisterController@register')->name('register.submit');

    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/dangnhap','AdminLoginController@showLoginForm')->name('login');
        Route::post('/dangnhap','AdminLoginController@login')->name('login.submit');

        Route::get('/dangxuat','AdminLoginController@logout')->name('logout');

        Route::get('/dangky','AdminRegisterController@showRegisterForm')->name('register');
        Route::post('/dangky','AdminRegisterController@register')->name('register.submit');
    });
});

Route::any('{all?}','HomeController@index')->where('all','(.*)');
