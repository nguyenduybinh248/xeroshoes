<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //
	protected $table = 'product_colors';
	protected $fillable = [
		'product_id','color_id'
	];
	public function product() {
		return $this->hasOne('App\Product', 'id', 'product_id');
	}
	public function color() {
		return $this->hasOne('App\Color', 'id', 'color_id');
	}
	public function product_details()
	{
		return $this->hasMany('App\ProductDetail');
	}
	public function images() {
		return $this->belongsToMany('App\Image','product_color_images','product_color_id','image_id');
	}
	public function sizes() {
		return $this->belongsToMany('App\Size','product_details','product_color_id','size_id');
	}
}
