<?php

use Illuminate\Database\Seeder;
use App\ProductColorImage;

class Product_color_imagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(ProductColorImage::class, 1000)->create();
    }
}
