<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterstedProduct extends Model
{
    //
	protected $table = 'intersted_products';
	protected $fillable = [
		'product_id','user_id'
	];

}
