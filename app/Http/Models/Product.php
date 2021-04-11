<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Http\Models\ProductCategory', 'product_category_id');
    }

    public function fabricator(){
        return $this->belongsTo('App\Http\Models\ProductFabricator', 'product_fabricator_id');
    }

    public function provider(){
        return $this->belongsTo('App\Http\Models\ProductProvider', 'product_provider_id');
    }

    public function properties(){
        return $this->hasMany('App\Http\Models\ProductProperty', 'product_id');
    }
}
