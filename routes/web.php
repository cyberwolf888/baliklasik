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
Route::post('/contact', 'HomeController@send_contact')->name('send_contact');
Route::get('/transaction/{id}', 'TransactionController@create')->name('transaction');
Route::post('/transaction/{id}', 'TransactionController@store')->name('transaction.store');
Route::get('/invoice/{id}', 'TransactionController@invoice')->name('invoice');

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

    //Extra item
    Route::group(['prefix' => 'item', 'as'=>'.item'], function() {
        Route::get('/', 'Master\ItemController@index')->name('.manage');
        Route::get('/create', 'Master\ItemController@create')->name('.create');
        Route::post('/create', 'Master\ItemController@store')->name('.store');
        Route::get('/update/{id}', 'Master\ItemController@edit')->name('.edit');
        Route::post('/update/{id}', 'Master\ItemController@update')->name('.update');
        Route::get('/detail/{id}', 'Master\ItemController@show')->name('.detail');
        Route::get('/delete/{id}', 'Master\ItemController@destroy')->name('.delete');
    });

    //transaction
    Route::group(['prefix' => 'transaction', 'as'=>'.transaction'], function() {
        Route::get('/', 'Master\TransactionController@index')->name('.manage');
        Route::get('/detail/{id}', 'Master\TransactionController@show')->name('.detail');
        Route::get('/cancel/{id}', 'Master\TransactionController@cancel')->name('.cancel');
        Route::get('/approve/{id}', 'Master\TransactionController@approve')->name('.approve');
        Route::get('/complete_transaction/{id}', 'Master\TransactionController@complete_transaction')->name('.complete_transaction');
        Route::get('/cancel_transaction/{id}', 'Master\TransactionController@cancel_transaction')->name('.cancel_transaction');
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

    //User
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

    //report
    Route::group(['prefix' => 'report', 'as'=>'.report'], function() {
        Route::get('/period', 'Master\ReportController@period')->name('.period');
        Route::post('/result', 'Master\ReportController@index')->name('.result');
    });
});

// Route master
Route::group(['prefix' => 'member', 'middleware' => ['role:member'], 'as'=>'member'], function() {
    Route::get('/', 'Member\DashboardController@index')->name('.dashboard');

    Route::group(['prefix' => 'wedding', 'as'=>'.transaction'], function() {
        Route::get('/', 'Member\TransactionController@index')->name('.manage');
        Route::get('/payment/{id}', 'Member\TransactionController@create_payment')->name('.payment');
        Route::post('/payment/{id}', 'Member\TransactionController@store_payment')->name('.store_payment');
        Route::get('/item/{id}', 'Member\TransactionController@create_items')->name('.item');
        Route::post('/item/{id}', 'Member\TransactionController@store_item')->name('.store_item');
        Route::post('/item/{id}/getTotal', 'Member\TransactionController@getTotalItem')->name('.getTotalItem');
    });

    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Member\ProfileController@index')->name('.manage');
        Route::post('/personal', 'Member\ProfileController@personal')->name('.personal');
        Route::post('/password', 'Member\ProfileController@password')->name('.password');
    });
});