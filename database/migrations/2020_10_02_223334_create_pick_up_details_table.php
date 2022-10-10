<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickUpDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pick_up_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('request_type');
            $table->integer('user_id');
            $table->string('order_number')->unique();
            $table->string('first_name');
            $table->string('payment_method');
            $table->string('pickup_status');
            $table->float('order_total');
            $table->float('shipping_cost');
            $table->float('grand_price');
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
        Schema::dropIfExists('pick_up_details');
    }
}
