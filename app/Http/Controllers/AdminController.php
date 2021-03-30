<?php

namespace App\Http\Controllers;

use App\Http\Models\AutoModel;
use App\Http\Models\Brand;
use App\Http\Requests\AutoModelRequest;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class AdminController extends Controller
{

    public function addBrand(BrandRequest $req){
        $brand = new Brand();
        $brandName = $req->input('name');

        $brand->name = $brandName;
        $brand->first_letter = substr($brandName, 0, 1);

        $saveStatus = $brand->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Бренд успешно добавлен");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

    public function addModel(AutoModelRequest $req){
        $autoModel = new AutoModel();

        $autoModel->brand_id = $req->input('brand_id');
        $autoModel->name = $req->input('model_name');
        $autoModel->img = $req->input('img');

        try {
            $autoModel->save();
            return $this->JSONResponse("success", "Успех", "Модель успешно добавлена");
        } catch (Exception $e){
            return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
        }
    }

}
