<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Models\Stock;
use App\Http\Requests\StockRequest;

trait StockTrait
{
    public function addOneStock(StockRequest $req){

        $stock = new Stock();

        $stock->title = $req->input('title');
        $stock->img = $req->input('img');
        $stock->desc = htmlspecialchars($req->input('desc'));
        $stock->date_start = $req->input('date_start');
        $stock->date_end = $req->input('date_end');

        $saveStatus = $stock->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Акция успешно добавлена");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function showStockEditPage($id){
        return view('admin.edit.editStock', [
            "stock" => Stock::findOrFail($id)
        ]);
    }

    public function editStock(StockRequest $req, $id){
        $stock  = Stock::findOrFail($id);

        $stock->title = $req->input('title');
        $stock->img = $req->input('img');
        $stock->desc = htmlspecialchars($req->input('desc'));
        $stock->date_start = $req->input('date_start');
        $stock->date_end = $req->input('date_end');

        $saveStatus = $stock->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Акция успешно изменена");
        } else return $this->JSONResponse("error", "Ошибка", "При изменении произошла ошибка");
    }
}
