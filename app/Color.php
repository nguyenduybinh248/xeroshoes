<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
	protected $table = 'colors';
	protected $fillable = [
		'color'
	];
	public function products() {
		return $this->belongsToMany('App\Product','product_colors','color_id','product_id');
	}
	public function product_colors()
	{
		return $this->hasMany('App\ProductColor');
	}
}
