<?php


namespace App\Http\Controllers\AdminPanel;

use App\Http\Models\Product;
use App\Http\Models\ProductCategory;
use App\Http\Models\ProductFabricator;
use App\Http\Models\ProductProperties;
use App\Http\Models\ProductProperty;
use App\Http\Models\ProductProvider;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Requests\ProductFabricatorRequest;
use App\Http\Requests\ProductPropertiesRequest;
use App\Http\Requests\ProductProviderRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SelectCategoryRequest;
use Illuminate\Support\Facades\DB;

trait ProductTrait
{
    public function addProductCategory(ProductCategoryRequest $req){
        $productCategory = new ProductCategory();

        $productCategory->name = $req->input('name');

        $saveStatus = $productCategory->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Категория товара успешно добавлена");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function addProductProperty(ProductPropertiesRequest $req){
        $productProperties = new ProductProperties();

        $productProperties->product_category_id = $req->input('category_id');
        $productProperties->name = $req->input('name');

        $saveStatus = $productProperties->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Свойство товара успешно добавлено");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function addProductFabricator(ProductFabricatorRequest $req){
        $productFabricator = new ProductFabricator();

        $productFabricator->name = $req->input('name');
        $productFabricator->logo = $req->input('logo');
        $productFabricator->description = $req->input('desc');

        $saveStatus = $productFabricator->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Производитель товара успешно добавлен");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function addProductProvider(ProductProviderRequest $req){
        $productProvider = new ProductProvider();

        $productProvider->name = $req->input('name');
        $productProvider->logo = $req->input('logo');
        $productProvider->description = $req->input('desc');

        $saveStatus = $productProvider->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Поставщик товара успешно добавлен");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function selectCategory(SelectCategoryRequest $req){
        $category_id = $req->input('category_id');

        return redirect()->route('product_add_view', [
            "productCategoryID" => $category_id,
        ]);
    }

    public function showAddProductPage($productCategoryID){
        $productProperties = ProductProperties::where('product_category_id', $productCategoryID)->get();
        if( count($productProperties) <= 0 ) abort(404);

        return view('admin.product.addProduct', [
            "autoModifications" => \App\Http\Models\Modification::all(),
            "productFabricators" => \App\Http\Models\ProductFabricator::all(),
            "productProviders" => \App\Http\Models\ProductProvider::all(),
            "productProperties" => $productProperties
        ]);
    }

    public function addProduct(ProductRequest $req, $productCategoryID){
        // Добавление товара
        $product = new Product();

        $product->product_category_id = $productCategoryID;
        $product->modification_id = $req->input('auto_modification');
        $product->product_fabricator_id = $req->input('fabricator');
        $product->product_provider_id = $req->input('provider');
        $product->name = $req->input('name');
        $product->count = $req->input('count');
        $product->img = $req->input('img');
        $product->price = $req->input('price');
        $product->date_added = date("Y-m-d");

        try{
            $product->save();
        } catch (\Exception $ex){
            return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
        }

        // Добавление свйоств товара
        $properties = [];
        foreach ( $req->input('properties') as $propertyID => $propertyValue ){
            $properties[] = [
                "product_id" => $product->id,
                "product_options_id" => $propertyID,
                "value" => $propertyValue,
            ];
        }

        try{
            DB::table('product_option')->insert($properties);
        } catch (\Exception $ex){
            return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
        }

        // Если всё ок
        return $this->JSONResponse("success", "Успех", "Товар успешно добавлен");
    }
}
