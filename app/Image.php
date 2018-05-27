<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
	protected $table = 'images';
	protected $fillable = [
		'path'
	];
	public function products() {
		return $this->belongsToMany('App\Product','product_images','image_id','product_id');
	}
}
