<?php

namespace App\Http\Controllers;

use App\Http\Models\AutoModel;
use App\Http\Models\Brand;
use App\Http\Models\Modification;
use App\Http\Models\Product;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{

    public function showBrands(){
        return view('maintenance.brands', $this->getBrandsData());
    }

    public static function getBrandsData(){
        $brand = new Brand();

        return [
            "brandsFirstLetter" => $brand->select('first_letter')->groupBy('first_letter')->get(),
            "brandsData" => $brand->select('id', 'name')->orderBy('name')->get()
        ];
    }

    public function showModel($id){
        $autoModel = AutoModel::where('brand_id', $id)->get();

        if( count($autoModel) < 1 ){
            return abort(404);
        } else {
            $brand = $autoModel[0]->Brand;
        }

        return view('maintenance.models', [
            "brandData" => $brand,
            "autoModels" => $autoModel
        ]);
    }

    public function showModification($brand_id, $model_id){
        $modification = Modification::where('model_id', $model_id)->get();

        if( count($modification) < 1 ){
            return abort(404);
        } else {
            $autoData = $modification[0];
        }

        return view('maintenance.modification', [
                "autoData" => $autoData,
                "modifications" => $modification
            ]);
    }

    public function showMaintenance($brand_id, $model_id, $modification_id){
        $products = Product::where('modification_id', $modification_id)->get();

        return view('maintenance.maintenance', [
            "autoData" => Modification::find($modification_id),
            "products" => $products
        ]);
    }
}
