<?php

use App\Http\Controllers\AdminPanel\AdminPanelController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Models\AutoModel;
use App\Http\Models\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();


// ************
// Переключение языков
// ************
Route::get('/locale/{locale}', [MainController::class, "changeLocale"])->name('locale');


// ************
// Основной роут
// ************
Route::get('/', [MainController::class, "showPage"])->name('main');


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
Route::view('/about-company', 'about-company')->name('about-company');


// ************
// Контакты
// ************
Route::view('/contacts', 'contacts')->name('contacts');
Route::post('/contacts/send', [MainController::class, "sendMail"])->name('contacts.send');


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
Route::group(['middleware' => 'isUserRole:admin'], function () {
    // ************
    // Редактирование данных организации
    // ************
    Route::view('/edit-organization', 'admin.edit.editSiteData')->name("admin.edit.editSiteData");
    Route::post('/edit-organization', [MainController::class, 'editOrganizationData'])->name("admin.edit.editSiteData");


    // ************
    // Добавление менеджера
    // ************
    Route::view('/add-manager', 'admin.addManager')->name("admin.addManager");
    Route::post('/add-manager', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name("admin.addManager_post");


    // ************
    // Просмотр списка заказов
    // ************
    Route::view('/order-list', "admin.orderList", [
        "orders" => Order::orderBy("id", "DESC")->paginate(4)
    ])->name("admin.orderList");
    Route::get('/order-list/{id}', [OrderController::class, "showOrder"])->name("admin.order");
});


// ************
// Для администратора и контент-менеджера
// ************
Route::group(['middleware' => ['isUserRole:admin,content']], function () {
    // ************
    // Редактирование слайдера
    // ************
    Route::view('/edit-slider', 'admin.edit.editSlider', [
        "slides" => \App\Http\Models\Slider::orderBy("id", "DESC")->get()
    ])->name("slider.edit");
    Route::get('/edit-slide/{id}', [\App\Http\Controllers\SliderController::class, 'showEditSlidePage'])->name("slide.edit");
    Route::post('/edit-slide/{id}', [\App\Http\Controllers\SliderController::class, 'editSlide'])->name("slide.edit");


    // ************
    // Добавление слайда
    // ************
    Route::view('/add-slide', 'admin.addSlide')->name("slide.add");
    Route::post('/add-slide', [\App\Http\Controllers\SliderController::class, 'addSlide'])->name("slide.add");


    // ************
    // Удаление слайда
    // ************
    Route::post('/delete-slide', [\App\Http\Controllers\SliderController::class, 'deleteSlide'])->name("slider.delete");


    // ************
    // Добавление новости
    // ************
    Route::view('/news/add', 'admin.addNews')->name("news_add");
    Route::post('/news/add', [AdminPanelController::class, 'addOneNews'])->name("news_add");


    // ************
    // Редактирование новости
    // ************
    Route::get('/news/edit/{id}', [AdminPanelController::class, "showNewsEditPage"])->name("news.edit");
    Route::post('/news/edit/{id}', [AdminPanelController::class, 'editNews'])->name("news.edit");


    // ************
    // Редактирование продукта
    // ************
    Route::get('/product/edit/{category_id}/{product_id}', [AdminPanelController::class, "showProductEditPage"])->name("product.edit");
    Route::post('/product/edit/{category_id}/{product_id}', [AdminPanelController::class, 'editProduct'])->name("product.edit");


    // ************
    // Добавление акции
    // ************
    Route::view('/stock/add', 'admin.addStock')->name("stock_add");
    Route::post('/stock/add', [AdminPanelController::class, 'addOneStock'])->name("stock_add");


    // ************
    // Редактирование акции
    // ************
    Route::get('/stock/edit/{id}', [AdminPanelController::class, "showStockEditPage"])->name("stock.edit");
    Route::post('/stock/edit/{id}', [AdminPanelController::class, 'editStock'])->name("stock.edit");


    // ************
    // Добавление авто
    // ************
    Route::prefix('add-auto')->group(function () {
        Route::prefix('brand')->group(function () {
            Route::view('', 'admin.addBrand')->name("brand_add");

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

    // ************
    // Добавление товара
    // ************
    Route::prefix('add-product')->group(function () {
        Route::prefix('category')->group(function () {
            Route::view('', 'admin.product.addCategory')->name("productCategory_add");
            Route::post('', [AdminPanelController::class, 'addProductCategory'])->name("productCategory_add");
        });

        Route::prefix('property')->group(function () {
            Route::view('', 'admin.product.addProperty', [
                "categories" => \App\Http\Models\ProductCategory::all(),
                "propType" => \App\Http\Models\PropertyType::all()
            ])->name("property_add");
            Route::post('', [AdminPanelController::class, 'addProductProperty'])->name("property_add");
        });

        Route::prefix('fabricator')->group(function () {
            Route::view('', 'admin.product.addFabricator')->name("fabricator_add");
            Route::post('', [AdminPanelController::class, 'addProductFabricator'])->name("fabricator_add");
        });

        Route::prefix('provider')->group(function () {
            Route::view('', 'admin.product.addProvider')->name("provider_add");
            Route::post('', [AdminPanelController::class, 'addProductProvider'])->name("provider_add");
        });

        Route::prefix('add-product/{productCategoryID}')->group(function () {
            Route::get('', [AdminPanelController::class, 'showAddProductPage'])
                ->name("product_add_view")
                ->where([
                    'productCategoryID' => '[0-9]+'
                ]);
            Route::post('', [AdminPanelController::class, 'addProduct'])->where([
                    'productCategoryID' => '[0-9]+'
                ]);;
        });

        Route::prefix('select-category')->group(function () {
            Route::view('', 'admin.product.selectCategory', [
                "productCategories" => \App\Http\Models\ProductCategory::all(),
            ])->name('selectCategory');
            Route::post('', [AdminPanelController::class, 'selectCategory']);
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
Route::view('admin', 'admin.login')->name('login-page');
Route::post('admin', 'Auth\LoginController@login')->name('login');


// ************
// Запачасти для ТО
// ************
Route::prefix('maintenance')->group(function (){
    Route::get('', [MaintenanceController::class, "showBrands"])
        ->name('maintenance_brands');

    Route::get('/{id}', [MaintenanceController::class, "showModel"])
        ->name('maintenance_models');

    Route::get('/{id_brand}/{id_model}', [MaintenanceController::class, "showModification"])
        ->name('maintenance_modification')
        ->where([
            'id_brand' => '[0-9]+',
            'id_model' => '[0-9]+',
        ]);

    Route::get('/{id_brand}/{id_model}/{id_modification}', [MaintenanceController::class, "showMaintenance"])
        ->name('maintenance_page')
        ->where([
            'id_brand' => '[0-9]+',
            'id_model' => '[0-9]+',
            'id_modification' => '[0-9]+',
        ]);
});


// ************
// Работа с продуктом
// ************
Route::prefix('product')->group(function (){
    Route::get('{id}', [ProductController::class, "showProductCatalogPage"])->name('product-catalog');
    Route::post('{id}', [ProductController::class, "filterProduct"])->name('product-filter');
    Route::get('{id_category}/{id_product}', [ProductController::class, "showProductPage"])->name('product');
});


// ************
// Корзина
// ************
Route::prefix('basket')->group(function (){
    Route::view('', 'basket.basket')->name('basket');
    Route::post('', [OrderController::class, "sendOrder"])->name('sendOrder');

    Route::post('add-item', [BasketController::class, "addItemsToBasket"])
        ->name('basketAddItems');

    Route::post('remove-item', [BasketController::class, "removeItemFromBasket"])
        ->name('basketRemoveItem');

    Route::post('count-item', [BasketController::class, "changeItemNum"])
        ->name('changeItemNum');
});
