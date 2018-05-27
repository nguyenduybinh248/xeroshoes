<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleEvent extends Model
{
    //
	protected $table = 'sale_events';
	protected $fillable = [
		'content','begin_date','end_date','slug','title','in_time','banner'
	];
	public function products() {
		return $this->belongsToMany('App\Product','sale_products','sale_id','product_id');
	}
}
