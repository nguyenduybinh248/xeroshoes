<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Laravel\Scout\Searchable;

class Product extends Model
{
    //
	use Searchable;
	protected $table = 'products';
	protected $fillable = [
		'name','original_price','price','sale_price','thumbnail','category_id','brand_id','description','type','status','is_sale','product_code','star','slug'
	];
	public function category() {
		return $this->hasOne('App\Category', 'id', 'category_id');
	}
	public function brand() {
		return $this->hasOne('App\Brand', 'id', 'brand_id');
	}
	public function rates()
	{
		return $this->hasMany('App\Rate');
	}
	public function replies()
	{
		return $this->hasMany('App\Reply');
	}
	public function intersted_users() {
		return $this->belongsToMany('App\User','intersted_products','product_id','user_id');
	}
	public function watched_users() {
		return $this->belongsToMany('App\User','watched_products','product_id','user_id');
	}
//	public function images() {
//		return $this->belongsToMany('App\Image','product_images','product_id','image_id');
//	}
	public function colors() {
		return $this->belongsToMany('App\Color','product_colors','product_id','color_id');
	}
	public function sale_events() {
		return $this->belongsToMany('App\SaleEvent','sale_products','product_id','sale_id');
	}
	public function product_colors()
	{
		return $this->hasMany('App\ProductColor');
	}
	public function product_details()
	{
		return $this->hasManyThrough('App\ProductDetail', 'App\ProductColor');
	}
	public function getStar(){
		$star = $this->star - 1;
		$stars = [];
		for ($i =0; $i < $star; $i++){
			$stars[$i] = $i;
		}
		$this->stars = $stars;
		return $this;
	}
	public function getImages($num){
		$arr_image =[];
		$product_colors = $this->product_colors;
		foreach ($product_colors as $color){
			$images = $color->images()->get();
			foreach ($images as $image){
				$path = $image->path;
				array_push($arr_image,$path);
			}
		}
		array_unique($arr_image);
		$count = count($arr_image);
		$arr=[];
		if ($count < $num){
			for($i = 0;$i < $count; $i++){
				$arr[$i] = $arr_image[$i];
			}
		}
		else{
			for($i = 0;$i < $num; $i++){
				$arr[$i] = $arr_image[$i];
			}
		}
		$this->images = $arr;
		return $this;
	}
}
