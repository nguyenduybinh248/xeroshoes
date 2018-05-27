<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColorImage extends Model
{
    //
	protected $table = 'product_color_images';
	protected $fillable = [
		'product_color_id','image_id'
	];
}
