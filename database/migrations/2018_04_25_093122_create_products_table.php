<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');
	        $table->integer('original_price');
	        $table->integer('price');
	        $table->integer('sale_price');
	        $table->unsignedInteger('category_id');
	        $table->foreign('category_id')->references('id')->on('categories');
	        $table->unsignedInteger('brand_id');
	        $table->foreign('brand_id')->references('id')->on('brands');
	        $table->tinyInteger('type')->comment('men:1 ,women:0 ,all:2');
	        $table->tinyInteger('is_sale')->comment('sale:1, not:0 ');
	        $table->tinyInteger('status')->comment('available:1, unavailable:0 ');
	        $table->string('product_code');
	        $table->string('slug');
	        $table->text('description');
	        $table->float('star');
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
        Schema::dropIfExists('products');
    }
}
