<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Product;
use App\SaleEvent;
use App\SaleProduct;

class CheckSale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_sale';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check sale event and product on sale';

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
	    $date = date('Y-m-d');
	    $date = date('Y-m-d', strtotime($date));
	    foreach ($products as $product){
	    	$a = 0;
	    	$sale_events = $product->sale_events;
	    	foreach ($sale_events as $event){
				$begin_date = $event->begin_date;
				$end_date = $event->end_date;
			    $begin_date = date('Y-m-d', strtotime($begin_date));
			    $end_date = date('Y-m-d', strtotime($end_date));
			    if ($date >= $begin_date && $date <= $end_date){
			    	$event->update(['in_time'=>1]);
			    	$a += 1;
			    }
			    else{
				    $event->update(['in_time'=>0]);
				    $a += 0;
			    }
		    }
		    if ($a >= 1){
	    		$product->update(['is_sale'=>1]);
		    }
		    else{
			    $product->update([['is_sale'=>0,'sale_price'=>0]]);
		    }
	    }
    }
}
