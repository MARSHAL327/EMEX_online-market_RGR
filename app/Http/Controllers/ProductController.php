<?php

namespace App\Http\Controllers;

use App\Http\Models\Product;
use App\Http\Models\ProductFabricator;
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

    private function filterFabricators($textInput, $categoryID){
        $MatchProductID = [];
        $prevMatchProductID = [];

        foreach ($textInput as $textValue){
            $propID = ProductFabricator::where('name', $textValue)->value("id");

            $MatchProductID = Product::where([
                ['product_fabricator_id', $propID],
                ['product_category_id', $categoryID]
            ])
                ->pluck('id')
                ->toArray();

            $MatchProductID = array_merge($prevMatchProductID, $MatchProductID);
            $prevMatchProductID = $MatchProductID;
        }

        return $MatchProductID;
    }

    private function filterTextProduct($textProps, $categoryID)
    {
        $MatchProductID = [];
        $prevMatchProductID = [];
        $MatchProductIDs = [];

        foreach ( array_values($textProps) as $i => $textProp) {
            foreach ( $textProp as $textInput ){
                $textInputName = array_keys($textProp)[0];

                if( $textInputName == "Производитель" )
                    $MatchProductID = $this->filterFabricators($textInput, $categoryID);
                else {
                    $propID = ProductProperties::where('name', $textInputName)->value("id");

                    foreach ($textInput as $textValue){
                        $MatchProductID = ProductProperty::where([
                            ["product_options_id", $propID],
                            ["value", $textValue["value"]]
                        ])
                            ->pluck('product_id')
                            ->toArray();

                        $MatchProductID = array_merge($prevMatchProductID, $MatchProductID);
                        $prevMatchProductID = $MatchProductID;
                    }
                }

                if( $i > 0 ){
                    $MatchProductIDs = array_intersect($MatchProductIDs, $MatchProductID);
                } else $MatchProductIDs = $MatchProductID;
            }
        }

        return $MatchProductIDs;
    }

    private function filterNumberProduct($numberInputs)
    {
        $MatchProductID = [];

        foreach ($numberInputs as $numberInput) {
            $propID = ProductProperties::where('name', $numberInput["name"])->value("id");

            $MatchProductID[] = ProductProperty::where("product_options_id", $propID)
                ->whereBetween("value", [(int)$numberInput["min"], (int)$numberInput["max"]])
                ->select("product_id")
                ->get();
        }

        return $MatchProductID;
    }

    public function filterProduct(Request $req, $categoryID)
    {
        $productsID = [];

        $textInputs = $req->input('text');
        $numberInputs = $req->input('number');

        if ($textInputs != NULL) {
            $productsID = $this->filterTextProduct($textInputs, $categoryID);
        }

//        if ($numberInputs != NULL) {
//            $query = array_merge($query, $this->filterNumberProduct($numberInputs));
//        }
//
//        $PrevProductsID = [];
//        for ($i = 0; $i < count($query); $i++) {
//            $productsID = [];
//
//            foreach ($query[$i] as $item) {
//                $productsID[] = $item->product_id ?? $item->id;
//            }
//
//            if ($i > 0) $productsID = array_intersect($productsID, $PrevProductsID);
//            $PrevProductsID = $productsID;
//        }

        if ($textInputs == NULL && $numberInputs == NULL) {
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
