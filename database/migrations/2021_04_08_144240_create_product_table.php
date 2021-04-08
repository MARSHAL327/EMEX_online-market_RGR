<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_category_id')->unsigned()->default(1);
            $table->foreign('product_category_id')->references('id')->on('product_category');

            $table->integer('modification_id')->unsigned()->default(1);
            $table->foreign('modification_id')->references('id')->on('modification');

            $table->integer('product_fabricator_id')->unsigned()->default(1);
            $table->foreign('product_fabricator_id')->references('id')->on('product_fabricator');

            $table->integer('product_provider_id')->unsigned()->default(1);
            $table->foreign('product_provider_id')->references('id')->on('product_provider');

            $table->string('name');
            $table->integer('count');
            $table->string('img');
            $table->integer('price');
            $table->date('date_added');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
