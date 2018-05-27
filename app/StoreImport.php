<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreImport extends Model
{
    //
	protected $table = 'store_imports';
	protected $fillable = [
		'product_detail_id','quantity','date','note','status'
	];
	public function product_detail() {
		return $this->hasOne('App\ProductDetail', 'id', 'product_detail_id');
	}
}
