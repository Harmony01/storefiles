<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('tel');
            $table->string('location');
            $table->string('paymentType');
            $table->string('amount');
            $table->string('tID');
            $table->string('Information')->nullable();
            $table->string('reference')->nullable();
            $table->string('orderId');
            $table->integer('status');
            $table->float('total_price');
            $table->integer('user_id');
            $table->integer('region_id')->unsigned();
            $table->integer('disctrict_id')->unsigned();
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
        Schema::dropIfExists('orders');
    }
}
