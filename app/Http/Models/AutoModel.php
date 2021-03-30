<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class AutoModel extends Model
{
    protected $table = "model";
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo('App\Http\Models\Brand');
    }
}
