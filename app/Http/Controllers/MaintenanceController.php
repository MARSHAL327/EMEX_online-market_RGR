<?php

namespace App\Http\Controllers;

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
        $brand = new Brand();

        return view('maintenance.models', [
            "brandName" => $brand->findOrFail($id)->name
        ]);
    }

    public function showModification(){
        return view('maintenance.modification');
    }
}
