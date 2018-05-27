<?php

use Illuminate\Database\Seeder;
use App\Rate;
class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(Rate::class, 100)->create();
    }
}
