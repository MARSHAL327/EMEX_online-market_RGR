<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->integer('user_data')->unsigned()->default(1);
            $table->foreign('user_data')->references('user_data_id')->on('users_data');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
