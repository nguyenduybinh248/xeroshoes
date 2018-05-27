<?php

use Illuminate\Database\Seeder;
use App\InterstedProduct;
class Intersted_productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(InterstedProduct::class, 200)->create();
    }
}
