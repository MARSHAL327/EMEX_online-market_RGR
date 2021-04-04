<?php

namespace App\Http\Controllers;

use App\Http\Models\Stock;

class StockController extends Controller
{
    public function showStock(){
        $stock = Stock::orderBy('date_start', 'desc')->paginate(3);
        return view('stock')->with([
            "stock" => $stock
        ]);
    }

    public function getSomeStock($countStock){
        $stock = new Stock();

        return $stock->take($countStock)->get();
    }
}
