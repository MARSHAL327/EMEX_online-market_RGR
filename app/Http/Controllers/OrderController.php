<?php

namespace App\Http\Controllers;

use App\Http\Models\Customer;
use App\Http\Models\Order;
use App\Http\Models\Orders;
use App\Http\Models\Product;
use App\Http\Requests\OrderRequest;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function showOrder($id){
        $orderData = Orders::where("order_id", $id)->get();

        return view("admin.order", [
            "orderID" => $id,
            "orderData" => $orderData
        ]);
    }

    public function sendOrder(OrderRequest $req){
        try {
            if( !isset($_COOKIE['basket_id']) ) throw new \ErrorException("При оформлении произошла ошибка");

            $basket = \Cart::session($_COOKIE['basket_id']);

            $customer = new Customer();
            $customer->fio = $req->fio;
            $customer->phone = $req->phone;
            $customer->save();

            $order = new Order();
            $order->customer_id = $customer->id;
            $order->date = date("Y-m-d H:m:i");
            $order->total_price = $basket->getSubTotal();
            $order->count_products = count($basket->getContent());
            $order->save();

            $products = [];

            foreach ($basket->getContent() as $basketItem){
                $products[] = [
                    "order_id" => $order->id,
                    "product_id" => $basketItem->id,
                    "product_total_price" => $basketItem->price * $basketItem->quantity,
                    "product_quantity" => $basketItem->quantity
                ];

                $product = Product::find($basketItem->id);
                $product->count = $product->count - $basketItem->quantity;
                $product->save();
            }

            DB::table('orders')->insert($products);

            $basket->clear();

            Mail::to("sanya.shvedenko@mail.ru")->send(new OrderMail($order));

            return $this->JSONResponse("success", "Успех", "Заказ успешно оформлен");
        } catch (\Exception $ex){
            return $this->JSONResponse("error", "Ошибка", $ex->getMessage());
        }

    }
}
