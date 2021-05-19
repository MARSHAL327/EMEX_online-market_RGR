<?php

namespace App\Http\Controllers;

use App\Http\Models\Orders;

class OrderController extends Controller
{
    public function showOrder($id){
        $orderData = Orders::where("order_id", $id)->get();

        return view("admin.order", [
            "orderID" => $id,
            "orderData" => $orderData
        ]);
    }
}
