<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('order_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('state');
            $table->string('city');
            $table->string('street');
            $table->string('email');
            $table->string('phone_no');
            $table->string('alt_phone_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_infos');
    }
}
