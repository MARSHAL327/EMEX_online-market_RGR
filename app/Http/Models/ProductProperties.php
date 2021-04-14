<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProperties extends Model
{
    protected $table = "product_options";
    public $timestamps = false;

    public function propType(){
        return $this->belongsTo('App\Http\Models\PropertyType', 'type');
    }

    public function option(){
        return $this->belongsTo('App\Http\Models\ProductProperty', 'id', 'product_options_id');
    }
}
