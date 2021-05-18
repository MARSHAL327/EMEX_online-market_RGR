<?php

namespace App\Http\Controllers;

use App\Http\Models\Product;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addItemsToBasket(Request $req){
        try {
            $uniqID = uniqid();
            if( !isset($_COOKIE['basket_id']) ) setcookie('basket_id', $uniqID, 0, "/");
            $basketID = $_COOKIE['basket_id'] ?? $uniqID;
            \Cart::session($basketID);

            $productInBasket = \Cart::get($req->input('id'));
            $numElementsRemaining = (int)$req->input('max_qty') - $req->input('qty');
            if( $productInBasket != null ){
                $numElementsRemaining = $req->input('max_qty') - $productInBasket->quantity;
                if( (int)$req->input('qty') > $numElementsRemaining ){
                    return response()->json([
                        "icon" => "error",
                        "title" => "Ошибка",
                        "text" => "Товаров в коризне: " . $productInBasket->quantity . "\nДоступно товаров: " . $numElementsRemaining,
                    ]);
                }
            }

            $product = Product::find($req->input('id'));
            if( $req->input('qty') < 1 || $req->input('qty') > $product->count )
                throw new \ErrorException("Неверное количество товаров");

            \Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => (int)$req->input('qty'),
                'attributes' => [
                    'img' => $product->img,
                    'fabricator' => $product->fabricator->name,
                    'numProduct' => $product->count
                ],
                'associatedModel' => 'App\Http\Models\Product'
            ]);

            return response()->json([
                "icon" => "success",
                "title" => "Товар успешно добавлен",
                "text" => "Добавлено товаров: " . $req->input('qty'),
                "numAddedItems" => (int)count(\Cart::getContent()),
                "numElementsRemaining" => $numElementsRemaining - $req->input('qty'),
            ]);
        } catch (\Exception $ex){
            return $this->JSONResponse("error", "Ошибка", $ex->getMessage());
        }
    }

    public function removeItemFromBasket(Request $req){
        \Cart::session($_COOKIE['basket_id'])->remove($req->id);
        $newTotalPrice = number_format(\Cart::session($_COOKIE['basket_id'])->getSubTotal(), 0, '.', ' ');

        return response()->json([
            "id" => $req->id,
            "newTotalPrice" => $newTotalPrice,
            "numItemsInBasket" => (int)count(\Cart::getContent())
        ]);
    }

    public function changeItemNum(Request $req){
        $newPrice = number_format($req->itemPrice * $req->newNum, 0, '.', ' ');
        \Cart::session($_COOKIE['basket_id'])->update($req->id,[
            'quantity' => [
                'relative' => false,
                'value' => (int)$req->newNum
            ]
        ]);

        return response()->json([
            "newPrice" => $newPrice,
            "newTotalPrice" => number_format(\Cart::session($_COOKIE['basket_id'])->getSubTotal(), 0, '.', ' '),
            "quantity" => (int)$req->newNum
        ]);
    }

    public function sendOrder(OrderRequest $req){
        return response()->json([
            "icon" => "success",
            "title" => "Успех",
            "text" => "Заказ успешно отправлен"
        ]);
    }
}
