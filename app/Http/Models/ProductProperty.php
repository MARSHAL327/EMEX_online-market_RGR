<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $table = "product_option";
    public $timestamps = false;

    public function properties(){
        return $this->belongsTo('App\Http\Models\ProductProperties', 'product_options_id');
    }
}
