<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('order_id')->unsigned()->default(1);
            $table->foreign('order_id')->references('id')->on('order');

            $table->integer('product_id')->unsigned()->default(1);
            $table->foreign('product_id')->references('id')->on('product');

            $table->integer('product_total_price');
            $table->integer('product_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
