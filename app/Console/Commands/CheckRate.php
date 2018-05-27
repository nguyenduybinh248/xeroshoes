<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;

class CheckRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check rate of product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
	    $products = Product::get();
	    foreach ($products as $product){
	    	$rates = $product->rates;
	    	$total = 0;
	    	foreach ($rates as $rate){
	    		$star = $rate->star;
	    		$total += $star;
		    }
		    $count = $rates->count();
	    	$arv = $total / $count;
	    	$a = floor($arv);
	    	$b = $arv - $a;
	    	if ($b == 0.5){
	    		$star_rate = $a + $b;
		    }
		    else{
			    $star_rate = $a + round($b);
		    }
		    $product->update(['star'=>$star_rate]);
	    }
    }
}
