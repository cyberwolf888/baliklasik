<?php

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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/plan', 'HomeController@plan')->name('plan');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/contact', 'HomeController@contact')->name('contact');

// Route master
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin'], 'as'=>'admin'], function() {
    //dashboard
    Route::get('/', 'Master\DashboardController@index')->name('.dashboard');

    //paket
    Route::group(['prefix' => 'paket', 'as'=>'.paket'], function() {
        Route::get('/', 'Master\PaketController@index')->name('.manage');
        Route::get('/create', 'Master\PaketController@create')->name('.create');
        Route::post('/create', 'Master\PaketController@store')->name('.store');
        Route::get('/update/{id}', 'Master\PaketController@edit')->name('.edit');
        Route::post('/update/{id}', 'Master\PaketController@update')->name('.update');
        Route::get('/detail/{id}', 'Master\PaketController@show')->name('.detail');
        Route::get('/delete/{id}', 'Master\PaketController@destroy')->name('.delete');
    });

    //gallery
    Route::group(['prefix' => 'gallery', 'as'=>'.gallery'], function() {
        Route::get('/', 'Master\GalleryController@index')->name('.manage');
        Route::get('/create', 'Master\GalleryController@create')->name('.create');
        Route::post('/create', 'Master\GalleryController@store')->name('.store');
        Route::get('/update/{id}', 'Master\GalleryController@edit')->name('.edit');
        Route::post('/update/{id}', 'Master\GalleryController@update')->name('.update');
        Route::get('/detail/{id}', 'Master\GalleryController@show')->name('.detail');
        Route::get('/delete/{id}', 'Master\GalleryController@destroy')->name('.delete');
    });

    //gallery
    Route::group(['prefix' => 'user', 'as'=>'.user'], function() {
        Route::group(['prefix' => 'member', 'as'=>'.member'], function() {
            Route::get('/', 'Master\UserController@member_index')->name('.manage');
            Route::get('/create', 'Master\UserController@member_create')->name('.create');
            Route::post('/create', 'Master\UserController@member_store')->name('.store');
            Route::get('/update/{id}', 'Master\UserController@member_edit')->name('.edit');
            Route::post('/update/{id}', 'Master\UserController@member_update')->name('.update');
            Route::get('/detail/{id}', 'Master\UserController@member_show')->name('.detail');
            Route::get('/delete/{id}', 'Master\UserController@member_destroy')->name('.delete');
        });

        Route::group(['prefix' => 'admin', 'as'=>'.admin'], function() {
            Route::get('/', 'Master\UserController@admin_index')->name('.manage');
            Route::get('/create', 'Master\UserController@admin_create')->name('.create');
            Route::post('/create', 'Master\UserController@admin_store')->name('.store');
            Route::get('/update/{id}', 'Master\UserController@admin_edit')->name('.edit');
            Route::post('/update/{id}', 'Master\UserController@admin_update')->name('.update');
            Route::get('/detail/{id}', 'Master\UserController@admin_show')->name('.detail');
            Route::get('/delete/{id}', 'Master\UserController@admin_destroy')->name('.delete');
        });
    });
});

// Route master
Route::group(['prefix' => 'member', 'middleware' => ['role:member'], 'as'=>'admin'], function() {
    Route::get('/', 'Member\DashboardController@index');
});