<?php

namespace App\Http\Controllers;

use App\Http\Models\Product;
use App\Http\Models\ProductProperties;
use App\Http\Models\ProductProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private const PER_PAGE = 3;

    public function showProductCatalogPage(Request $req, $categoryID)
    {

        if ($req->input('text') != NULL || $req->input('number') != NULL) {
            return $this->filterProduct($req, $categoryID);
        }
        $query = Product::where('product_category_id', $categoryID);
        $listProduct = $query->get();
        $paginateListProduct = $query->paginate(self::PER_PAGE);
        $productData = $this->ModelFirstElement($listProduct);

        $productProperties = ProductProperties::where('product_category_id', $categoryID)->get();
        $props = [];

        foreach ($productProperties as $productProperty) {
            $props[] = ProductProperty::where('product_options_id', $productProperty->id)->select('product_options_id', 'value')->distinct()->get();
        }

        $fabricatorNames = [];
        foreach ($listProduct as $product) {
            $fabricatorNames[] = $product->fabricator->name;
        }

        return view('product.product-catalog', [
            "productData" => $productData,
            "categoryID" => $categoryID,
            "paginateListProduct" => $paginateListProduct,
            "props" => $props,
            "fabricatorNames" => array_unique($fabricatorNames),
        ]);
    }

    public function showProductPage($categoryID, $productID)
    {
        $product = Product::firstWhere('id', $productID);

        return view('product.product', [
            "product" => $product,
        ]);
    }

    public function filterProduct(Request $req, $categoryID)
    {
        $productsID = [];
        $temp = [];
        $query = [];

        if ($req->input('text') != NULL) {
            foreach ($req->input('text') as $item) {
                $propID = ProductProperties::where('name', $item["name"])->value("id");

                $query[] = ProductProperty::where([
                    ["product_options_id", $propID],
                    ["value", $item["value"]]
                ])
                    ->select("product_id")
                    ->get();
            }
        }

        if ($req->input('number') != NULL) {
            foreach ($req->input('number') as $item) {
                $propID = ProductProperties::where('name', $item["name"])->value("id");

                $query[] = ProductProperty::where("product_options_id", $propID)
                    ->whereBetween("value", [(int)$item["min"], (int)$item["max"]])
                    ->select("product_id")
                    ->get();
            }
        }

        if( count($query) > 0 ){
            for ($i = 0; $i <  count($query); $i++) {
                $productsID = [];

                foreach ($query[$i] as $item) {
                    $productsID[] = $item->product_id;
                }

                if( $i > 0 ) $productsID = array_intersect($productsID, $temp);
                $temp = $productsID;
            }
        }

        if ($req->input('text') == NULL && $req->input('number') == NULL) {
            $paginateListProduct = Product::where('product_category_id', $categoryID)->paginate(self::PER_PAGE);
        } else {
            $paginateListProduct = Product::whereIn('id', array_unique($productsID))->paginate(self::PER_PAGE);
        }

        return view('product.product-catalog-card', [
            "categoryID" => $categoryID,
            "paginateListProduct" => $paginateListProduct
        ]);
    }
}
