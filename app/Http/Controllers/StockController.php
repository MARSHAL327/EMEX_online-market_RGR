<?php

namespace App\Http\Controllers;

use App\Http\Models\Stock;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    public function showStock(){
        $stock = Stock::paginate(3);
        return view('stock')->with([
            "stock" => $stock
        ]);
    }

    public function getSomeStock($countStock){
        $stock = new Stock();

        return $stock->take($countStock)->get();
    }


    public function addOneStock(StockRequest $req){

        $stock = new Stock();

        $stock->title = $req->input('title');
        $stock->img = "img/" . $req->input('img');
        $stock->desc = $req->input('desc');
        $stock->date_start = $req->input('date_start');
        $stock->date_end = $req->input('date_end');

        $saveStatus = $stock->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Акция успешно добавлена");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }
}
