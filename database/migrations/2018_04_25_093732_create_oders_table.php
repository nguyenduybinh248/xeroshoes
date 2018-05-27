<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_code');
            $table->string('name');
            $table->string('phone');
            $table->text('address');
	        $table->unsignedInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	        $table->tinyInteger('status')->comment('1: delivery, 0: waiting, 2:cancel');
	        $table->date('expected_delivery_date');
	        $table->date('delivery_date');
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
        Schema::dropIfExists('oders');
    }
}
