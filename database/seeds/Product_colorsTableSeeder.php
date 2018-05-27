<?php

use Illuminate\Database\Seeder;
use App\ProductColor;

class Product_colorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(ProductColor::class, 200)->create();
    }
}
