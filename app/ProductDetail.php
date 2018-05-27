<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
	protected $table = 'product_details';
	protected $fillable = [
		'product_color_id','size_id','quantity'
	];
	public function orders() {
		return $this->belongsToMany('App\Oder','order_details','product_detail_id','order_id');
	}
	public function store_imports()
	{
		return $this->hasMany('App\StoreImport')->orderBy('created_at','DESC');
	}
	public function store_exports()
	{
		return $this->hasMany('App\StoreExport');
	}
	public function oder_details()
	{
		return $this->hasMany('App\OrderDetail');
	}
	public function size() {
		return $this->hasOne('App\Size', 'id', 'size_id');
	}
	public function product_color() {
		return $this->hasOne('App\ProductColor', 'id', 'product_color_id');
	}
	public static function update_quantity($id) {
		$product_detail = ProductDetail::find($id);
		$plus = 0;
		$minus = 0;
		$imports = $product_detail->store_imports;
		$exports = $product_detail->store_exports;
		foreach ($imports as $import){
			$a = $import->quantity;
			$plus += $a;
		}
		foreach ($exports as $export){
			$b = $export->quantity;
			$minus += $b;
		}
		$quanity = $plus - $minus;
		$product_detail->update(['quantity'=>$quanity]);
		return $product_detail;
	}
}
