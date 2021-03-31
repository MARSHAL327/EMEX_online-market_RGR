<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    protected $table = "modification";
    public $timestamps = false;

    public function autoModel(){
        return $this->belongsTo('App\Http\Models\AutoModel', 'model_id');
    }
}
