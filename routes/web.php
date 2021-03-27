<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// ************
// Основной роут
// ************
Route::get('/', "MainController@showPage")->name('main');


// ************
// Новостные роуты
// ************
Route::get('/news/all', "NewsController@showNews")->name('news_all');
Route::get('/news/{id}', "NewsController@showOneNews")
    ->name('news_one')
    ->where('id', '[0-9]+');

Route::get('/stock/all', "StockController@showStock")->name('stock_all');


// ************
// О Компании
// ************
Route::get('/about-company', function () {
    return view('about-company');
})->name('about-company');


// ************
// Контакты
// ************
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');


// ************
// Выйти из системы
// ************
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


// ************
// Для авторизованных пользователей
// ************
Route::group(['middleware' => 'auth'], function () {
    // ************
    // Добавление новости
    // ************
    Route::get('/news/add', function () {
        return view('admin.addNews');
    })->name("news_add");

    Route::post('/news/add', 'NewsController@addOneNews')->name("news_add");


    // ************
    // Добавление акции
    // ************
    Route::get('/stock/add', function () {
        return view('admin.addStock');
    })->name("stock_add");

    Route::post('/stock/add', 'StockController@addOneStock')->name("stock_add");
});


// ************
// Регистрация
// ************
Route::post('auth/register', 'Auth\RegisterController@register')->name('register');


// ************
// Авторизация
// ************
Route::post('auth/login', 'Auth\LoginController@login')->name('login');


// ************
// Бренды автомобилей
// ************
Route::get('/maintenance/brands', "MaintenanceController@showBrands")
    ->name('maintenance_brands');
