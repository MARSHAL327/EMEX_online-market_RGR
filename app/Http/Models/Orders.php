<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Http\Models\Product', 'product_id');
    }

    public function order(){
        return $this->belongsTo('App\Http\Models\Order', 'order_id');
    }
}
