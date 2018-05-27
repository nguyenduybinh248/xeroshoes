<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
	protected $table = 'orders';
	protected $fillable = [
		'name','phone','address','email','status','user_id','order_code','expected_delivery_date','delivery_date','total'
	];
	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	public function order_details()
	{
		return $this->hasMany('App\OrderDetail');
	}
	public function product_details() {
		return $this->belongsToMany('App\ProductDetail','order_details','order_id','product_detail_id');
	}
}
