<?php

namespace App\Http\Controllers;

use App\Http\Models\Product;
use App\Http\Models\ProductProperty;

class ProductController extends Controller
{
    public function showProductCatalogPage($categoryID){
        $listProduct = Product::where('product_category_id', $categoryID)->get();
        $productData = $this->ModelFirstElement($listProduct);

        $productProperties = ProductProperty::where('product_id', $productData->id)->get();

        $fabricatorNames = [];
        foreach ($listProduct as $product) {
            $fabricatorNames[] = $product->fabricator->name;
        }

        return view('product.product-catalog', [
            "productData" => $productData,
            "listProduct" => $listProduct,
            "productProperties" => $productProperties,
            "fabricatorNames" => $fabricatorNames,
        ]);
    }

    public function showProductPage($categoryID, $productID){
        $product = Product::firstWhere('id', $productID);

        return view('product.product', [
            "product" => $product,
        ]);
    }
}
