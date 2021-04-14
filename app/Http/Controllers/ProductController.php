<?php

namespace App\Http\Controllers;

use App\Http\Models\Product;
use App\Http\Models\ProductProperties;
use App\Http\Models\ProductProperty;

class ProductController extends Controller
{
    public function showProductCatalogPage($categoryID){
        $listProduct = Product::where('product_category_id', $categoryID)->get();
        $productData = $this->ModelFirstElement($listProduct);

        $productProperties = ProductProperties::where('product_category_id', $categoryID)->get();
        $props = [];

        foreach ($productProperties as $productProperty) {
            $props[] = ProductProperty::where('product_options_id', $productProperty->id)->get();
        }

        $fabricatorNames = [];
        foreach ($listProduct as $product) {
            $fabricatorNames[] = $product->fabricator->name;
        }

        return view('product.product-catalog', [
            "productData" => $productData,
            "listProduct" => $listProduct,
            "props" => $props,
            "fabricatorNames" => array_unique($fabricatorNames),
        ]);
    }

    public function showProductPage($categoryID, $productID){
        $product = Product::firstWhere('id', $productID);

        return view('product.product', [
            "product" => $product,
        ]);
    }
}
