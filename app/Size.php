<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
	protected $table = 'sizes';
	protected $fillable = [
		'size'
	];
	public function product_colors() {
		return $this->belongsToMany('App\ProductColor','product_details','size_id','product_color_id');
	}
}
