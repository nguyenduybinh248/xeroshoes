<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_imports', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('product_detail_id');
	        $table->foreign('product_detail_id')->references('id')->on('product_details')->onDelete('cascade');
	        $table->integer('quantity');
	        $table->date('date');
	        $table->text('note');
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
        Schema::dropIfExists('store_imports');
    }
}
