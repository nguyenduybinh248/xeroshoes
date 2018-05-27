<?php

use Illuminate\Database\Seeder;
use App\Reply;
class ReplysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(Reply::class, 300)->create();
    }
}
