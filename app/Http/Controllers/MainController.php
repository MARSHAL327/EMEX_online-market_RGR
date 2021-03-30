<?php

namespace App\Http\Controllers;

use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showPage(){
        $news = new NewsController();
        $stock = new StockController();
        $maintenance = new MaintenanceController();

        return view('main', [
            "news" => $news->getSomeNews(3),
            "stock" => $stock->getSomeStock(4),
        ] + $maintenance->getBrandsData());
    }
}
