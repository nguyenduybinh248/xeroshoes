<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductColorImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_color_images', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('product_color_id');
	        $table->foreign('product_color_id')->references('id')->on('product_colors')->onDelete('cascade');
	        $table->unsignedInteger('image_id');
	        $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
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
        Schema::dropIfExists('product_color_images');
    }
}
