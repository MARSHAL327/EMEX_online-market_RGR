<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsModelsTable extends Migration
{

    public function up()
    {
        Schema::create('news_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('desc');
            $table->string('img');
            $table->text('text');
            $table->date('date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_models');
    }

}
