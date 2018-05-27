<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
	protected $table = 'order_details';
	protected $fillable = [
		'product_detail_id','quantity','order_id','price'
	];
	public function product_detail() {
		return $this->hasOne('App\ProductDetail', 'id', 'product_detail_id');
	}
}
