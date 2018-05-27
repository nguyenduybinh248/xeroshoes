<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;

class CheckProductStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:product_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check status of product';

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
	    	$total = 0;
	    	$product_details = $product->product_details;
	    	foreach ($product_details as $detail){
	    		$detail->update_quantity($detail->id);
	    		$qty = $detail->quantity;
	    		$total += $qty;
		    }
		    $price = $product->price;
	    	if (!$price or $total == 0){
	    		$product->update(['status'=>0]);
		    }
		    else{
			    $product->update(['status'=>1]);
		    }
	    }
    }
}
