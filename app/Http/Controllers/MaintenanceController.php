<?php

namespace App\Http\Controllers;

use App\Http\Models\AutoModel;
use App\Http\Models\Brand;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{

    public function showBrands(){
        return view('maintenance.brands')->with($this->getBrandsData());
    }

    public function getBrandsData(){
        $brand = new Brand();

        return [
            "brandsFirstLetter" => $brand->select('first_letter')->groupBy('first_letter')->get(),
            "brandsData" => $brand->select('id', 'name')->orderBy('name')->get()
        ];
    }

    public function showModel($id){
        $auoModel = AutoModel::where('brand_id', $id)->get();

        $brand = (count($auoModel) < 1) ? Brand::find($id) : $auoModel[0]->Brand;

        return view('maintenance.models', [
            "brandName" => $brand->name,
            "brandID" => $brand->id,
            "autoModels" => $auoModel
        ]);
    }

    public function showModification($brand_id, $model_id){
        return view('maintenance.modification');
    }
}
