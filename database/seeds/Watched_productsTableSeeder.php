<?php

use Illuminate\Database\Seeder;
use App\WatchedProduct;
class Watched_productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(WatchedProduct::class, 500)->create();
    }
}
