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
    });
});

// Route master
Route::group(['prefix' => 'member', 'middleware' => ['role:member'], 'as'=>'admin'], function() {
    Route::get('/', 'Member\DashboardController@index');
});