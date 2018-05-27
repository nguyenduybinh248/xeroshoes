<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    //
	protected $table = 'sale_products';
	protected $fillable = [
		'product_id','sale_id'
	];
}
