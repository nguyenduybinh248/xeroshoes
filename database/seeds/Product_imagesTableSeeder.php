<?php

use Illuminate\Database\Seeder;
use App\ProductImage;
class Product_imagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(ProductImage::class, 500)->create();
    }
}
