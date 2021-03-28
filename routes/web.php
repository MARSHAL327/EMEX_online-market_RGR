<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();

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
// Для администратора
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


    // ************
    // Добавление авто
    // ************
    Route::get('/add-auto', function () {
        return view('admin.addAuto');
    })->name("auto_add");

    Route::post('/add-auto', 'AdminController@addBrand')->name("auto_add");
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
// Запачасти для ТО
// ************
Route::get('/maintenance', "MaintenanceController@showBrands")
    ->name('maintenance_brands');

Route::get('/maintenance/{id}', "MaintenanceController@showModel")
    ->name('maintenance_models')
    ->where('id', '[0-9]+');;

Route::get('/maintenance/2/3', "MaintenanceController@showModification")
    ->name('maintenance_modification');
