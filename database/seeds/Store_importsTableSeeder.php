<?php

use Illuminate\Database\Seeder;
use App\StoreImport;

class Store_importsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(StoreImport::class, 2000)->create();
    }
}
