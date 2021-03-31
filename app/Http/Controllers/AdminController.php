<?php

namespace App\Http\Controllers;

use App\Http\Models\AutoModel;
use App\Http\Models\Brand;
use App\Http\Models\Modification;
use App\Http\Requests\AutoModelRequest;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\ModificationRequest;
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

    public function addModification(ModificationRequest $req){
        $modification = new Modification();

        $modification->model_id = $req->input('model_id');
        $modification->name = $req->input('modification_name');
        $modification->engine_type = $req->input('engine_type');
        $modification->engine_model = $req->input('engine_model');
        $modification->engine_volume = $req->input('engine_volume');
        $modification->power = $req->input('power');

        try {
            $modification->save();
            return $this->JSONResponse("success", "Успех", "Модификация успешно добавлена");
        } catch (Exception $e){
            return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
        }
    }

    public function showModification(){
        $autoModel = new AutoModel();

        return view('admin.addModification', AutoModel::all());
    }

    public function showAutoModel(){
        $maintenance = new MaintenanceController();

        return view('admin.addModel', $maintenance->getBrandsData());
    }

}
