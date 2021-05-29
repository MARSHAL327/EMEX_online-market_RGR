<?php


namespace App\Http\Controllers\AdminPanel;

use App\Http\Models\Product;
use App\Http\Models\ProductCategory;
use App\Http\Models\ProductFabricator;
use App\Http\Models\ProductProperties;
use App\Http\Models\ProductProperty;
use App\Http\Models\ProductProvider;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Requests\ProductFabricatorRequest;
use App\Http\Requests\ProductPropertiesRequest;
use App\Http\Requests\ProductProviderRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SelectCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

trait ProductTrait
{
    public function addProductCategory(ProductCategoryRequest $req)
    {
        $productCategory = new ProductCategory();

        $productCategory->name = $req->input('name');

        $saveStatus = $productCategory->save();

        if ($saveStatus) {
            return $this->JSONResponse("success", "Успех", "Категория товара успешно добавлена");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function addProductProperty(ProductPropertiesRequest $req)
    {
        $productProperties = new ProductProperties();

        $productProperties->product_category_id = $req->input('category_id');
        $productProperties->name = $req->input('name');
        $productProperties->type = $req->input('prop_type_id');

        $saveStatus = $productProperties->save();

        if ($saveStatus) {
            return $this->JSONResponse("success", "Успех", "Свойство товара успешно добавлено");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function addProductFabricator(ProductFabricatorRequest $req)
    {
        $productFabricator = new ProductFabricator();

        $productFabricator->name = $req->input('name');
        $productFabricator->logo = $req->input('logo');
        $productFabricator->description = htmlspecialchars($req->input('desc'));

        $saveStatus = $productFabricator->save();

        if ($saveStatus) {
            return $this->JSONResponse("success", "Успех", "Производитель товара успешно добавлен");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function addProductProvider(ProductProviderRequest $req)
    {
        $productProvider = new ProductProvider();

        $productProvider->name = $req->input('name');
        $productProvider->logo = $req->input('logo');
        $productProvider->description = htmlspecialchars($req->input('desc'));

        $saveStatus = $productProvider->save();

        if ($saveStatus) {
            return $this->JSONResponse("success", "Успех", "Поставщик товара успешно добавлен");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function selectCategory(SelectCategoryRequest $req)
    {
        $category_id = $req->input('category_id');

        return redirect()->route('product_add_view', [
            "productCategoryID" => $category_id,
        ]);
    }

    public function showAddProductPage($productCategoryID)
    {
        $productProperties = ProductProperties::where('product_category_id', $productCategoryID)->get();
        if (count($productProperties) <= 0) abort(404);

        return view('admin.product.addProduct', [
            "autoModifications" => \App\Http\Models\Modification::all(),
            "productFabricators" => \App\Http\Models\ProductFabricator::all(),
            "productProviders" => \App\Http\Models\ProductProvider::all(),
            "productProperties" => $productProperties
        ]);
    }


    public function addProduct(ProductRequest $req, $productCategoryID, $product = null)
    {
        $editMode = false;

        if ($product == null){
            $product = new Product();
            $successMessage = "Товар успешно добавлен";
            $errorMessage = "При добавлении произошла ошибка";
        } else {
            $editMode = true;
            $successMessage = "Товар успешно изменён";
            $errorMessage = "При изменении произошла ошибка";
        }


        $product->product_category_id = (int)$productCategoryID;
        $product->modification_id = (int)$req->input('auto_modification');
        $product->product_fabricator_id = (int)$req->input('fabricator');
        $product->product_provider_id = (int)$req->input('provider');
        $product->name = $req->input('name');
        $product->count = (int)$req->input('count');

        if ( $editMode ){
            if( $req->input('edit_img') != null )
                $product->img = $req->input('edit_img');
        } else if ( $req->input('img') != null ) {
            $product->img = $req->input('img');
        } else return $this->JSONResponse("error", "Ошибка", "Поле картинка товара обязательно для заполнения");

        $product->price = (int)$req->input('price');
        $product->date_added = date("Y-m-d");

        try {
            $product->save();

            if( $editMode ){
                $this->updatePropertyValues($req, $product);
            } else $this->addProperty($req, $product);

        } catch (\Exception $ex) {
            return $this->JSONResponse("error", "Ошибка", $errorMessage);
        }

        // Если всё ок
        return $this->JSONResponse("success", "Успех", $successMessage);
    }


    public function showProductEditPage($categoryID, $productID)
    {
        $product = Product::findOrFail($productID);

        return view('admin.edit.editProduct', [
            "autoModifications" => \App\Http\Models\Modification::all(),
            "productFabricators" => \App\Http\Models\ProductFabricator::all(),
            "productProviders" => \App\Http\Models\ProductProvider::all(),
            "productCategories" => \App\Http\Models\ProductCategory::all(),
            "productPropertiesValue" => ProductProperty::where("product_id", $productID)->get(),
            "product" => $product
        ]);
    }

    public function editProduct(ProductRequest $req, $categoryID, $productID)
    {
        $product = Product::findOrFail($productID);

        return $this->addProduct($req, $categoryID, $product);
    }


    public function addProperty($req, $product){
        $properties = [];
        foreach ($req->input('properties') as $propertyID => $propertyValue) {
            $properties[] = [
                "product_id" => $product->id,
                "product_options_id" => $propertyID,
                "value" => $propertyValue,
            ];
        }

        DB::table('product_option')->insert($properties);
    }


    public function updatePropertyValues($req, $product){
        $productProps = ProductProperty::where("product_id", $product->id)->get();

        foreach ($productProps as $property) {
            if( $property->properties->type == 1 ){
                $property->value = (int)$req->input('properties')[$property->product_options_id];
            } else $property->value = $req->input('properties')[$property->product_options_id];

            $property->save();
        }
    }
}
