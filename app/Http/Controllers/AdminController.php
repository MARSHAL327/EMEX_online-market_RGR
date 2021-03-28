<?php

namespace App\Http\Controllers;

use App\Http\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;

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

}
