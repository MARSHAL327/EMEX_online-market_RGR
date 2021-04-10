<?php


namespace App\Http\Controllers\AdminPanel;

use App\Http\Models\ProductCategory;
use App\Http\Models\ProductFabricator;
use App\Http\Models\ProductProperties;
use App\Http\Models\ProductProvider;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Requests\ProductFabricatorRequest;
use App\Http\Requests\ProductPropertiesRequest;
use App\Http\Requests\ProductProviderRequest;
use App\Http\Requests\SelectCategoryRequest;

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
            "productCategoryID" =>  $category_id,
        ]);
    }

    public function showAddProductPage($productCategoryID){
        $productProperties = ProductProperties::where('product_category_id', $productCategoryID)->get();

        return view('admin.product.addProduct', [
            "autoModifications" => \App\Http\Models\Modification::all(),
            "productFabricators" => \App\Http\Models\ProductFabricator::all(),
            "productProviders" => \App\Http\Models\ProductProvider::all(),
            "productProperties" => $productProperties
        ]);
    }
}
