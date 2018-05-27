<?php

use Illuminate\Database\Seeder;
use App\ProductDetail;

class Product_detailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(ProductDetail::class, 800)->create();
    }
}
