<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";
    public $timestamps = false;

    public function customer(){
        return $this->belongsTo('App\Http\Models\Customer', 'customer_id');
    }
}
