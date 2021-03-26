<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/news/all', "NewsController@showNews")->name('news_all');
Route::get('/news/{id}', "NewsController@showOneNews")
    ->name('news_one')
    ->where('id', '[0-9]+');

Route::get('/stock/all', "StockController@showStock")->name('stock_all');


Route::get('/about-company', function () {
    return view('about-company');
})->name('about-company');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/news/add', function() {
        return view('admin.addNews');
    })->name("news_add");

    Route::post('/news/add', 'NewsController@addOneNews')->name("news_add");

    Route::get('/stock/add', function() {
        return view('admin.addStock');
    })->name("stock_add");

    Route::post('/stock/add', 'StockController@addOneStock')->name("stock_add");
});

Route::post('auth/register', 'Auth\RegisterController@register')->name('register');
Route::post('auth/login', 'Auth\LoginController@login')->name('login');
