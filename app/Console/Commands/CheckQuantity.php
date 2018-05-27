<?php

namespace App\Console\Commands;

use App\ProductDetail;
use Illuminate\Console\Command;

class CheckQuantity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:quantity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check quantity of product';

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
	    $details = ProductDetail::get();
	    foreach ($details as $detail){
	    	ProductDetail::update_quantity($detail->id);
	    }
    }
}
