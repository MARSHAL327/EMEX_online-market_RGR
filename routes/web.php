<?php

use App\Http\Controllers\AdminPanel\AdminPanelController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StockController;
use App\Http\Models\AutoModel;
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
Route::get('/news/all', [NewsController::class, 'showNews'])->name('news_all');
Route::get('/news/{id}', [NewsController::class, 'showOneNews'])->name('news_one');

// ************
// Акции
// ************
Route::get('/stock/all', [StockController::class, 'showStock'])->name('stock_all');


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
    Route::view('/news/add', 'admin.addNews')->name("news_add");

    Route::post('/news/add', [AdminPanelController::class, 'addOneNews'])->name("news_add");


    // ************
    // Добавление акции
    // ************
    Route::view('/stock/add', 'admin.addStock')->name("stock_add");

    Route::post('/stock/add', [AdminPanelController::class, 'addOneStock'])->name("stock_add");


    // ************
    // Добавление авто
    // ************
    Route::prefix('add-auto')->group(function () {
        Route::prefix('brand')->group(function () {
            Route::get('', function () {
                return view('admin.addBrand');
            })->name("brand_add");

            Route::post('', [AdminPanelController::class, 'addBrand'])->name("brand_add");
        });

        Route::prefix('model')->group(function () {
            Route::view('', 'admin.addModel', [
                "brandsData" => \App\Http\Models\Brand::all()
            ])->name("model_add");

            Route::post('', [AdminPanelController::class, 'addModel'])->name("model_add");
        });

        Route::prefix('modification')->group(function () {
            Route::view('', 'admin.addModification', [
                "autoModelData" => AutoModel::all()
            ])->name("modification_add");

            Route::post('', [AdminPanelController::class, 'addModification'])->name("modification_add");
        });
    });
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

Route::prefix('maintenance')->group(function (){
    Route::get('', "MaintenanceController@showBrands")
        ->name('maintenance_brands');

    Route::get('/{id}', "MaintenanceController@showModel")
        ->name('maintenance_models');

    Route::get('/{id_brand}/{id_model}', "MaintenanceController@showModification")
        ->name('maintenance_modification')
        ->where([
            'id_brand' => '[0-9]+',
            'id_model' => '[0-9]+',
        ]);

    Route::get('/{id_brand}/{id_model}/{id_modification}', "MaintenanceController@showMaintenance")
        ->name('maintenance_page')
        ->where([
            'id_brand' => '[0-9]+',
            'id_model' => '[0-9]+',
            'id_modification' => '[0-9]+',
        ]);
});

