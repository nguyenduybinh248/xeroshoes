<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('product_detail_id');
	        $table->foreign('product_detail_id')->references('id')->on('product_details')->onDelete('cascade');
	        $table->unsignedInteger('order_id');
	        $table->foreign('order_id')->references('id')->on('oders')->onDelete('cascade');
	        $table->integer('quantity');
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
        Schema::dropIfExists('order_details');
    }
}