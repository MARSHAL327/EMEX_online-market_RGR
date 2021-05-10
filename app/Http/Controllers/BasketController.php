<?php

namespace App\Http\Controllers;

use App\Http\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addItemsToBasket(Request $req){
        try {
            $uniqID = uniqid();
            if( !isset($_COOKIE['basket_id']) ) setcookie('basket_id', $uniqID, 0, "/");
            $basketID = $_COOKIE['basket_id'] ?? $uniqID;
            \Cart::session($basketID);

            $product = Product::find($req->input('id'));
            \Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => (int)$req->input('qty'),
                'attributes' => [
                    'img' => $product->img,
                    'fabricator' => $product->fabricator->name
                ],
                'associatedModel' => 'App\Http\Models\Product'
            ]);


            if( $req->input('qty') < 1 || $req->input('qty') > $product->count )
                throw new \ErrorException("Неверное количество товаров");

            return $this->JSONResponse(
                "success",
                "Товар успешно добавлен",
                "Добавлено товаров: " . $req->input('qty')
            );
        } catch (\Exception $ex){
            return $this->JSONResponse("error", "Ошибка", $ex->getMessage());
        }
    }

    public function removeItemFromBasket(Request $req){

    }
}
