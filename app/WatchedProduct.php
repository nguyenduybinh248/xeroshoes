<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchedProduct extends Model
{
    //
	protected $table = 'watched_products';
	protected $fillable = [
		'product_id','user_id'
	];

}
