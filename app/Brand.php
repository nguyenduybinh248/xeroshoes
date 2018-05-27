<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Brand extends Model
{
    //
	use Searchable;
	protected $table = 'brands';
	protected $fillable = [
		'name'
	];
	public function product()
	{
		return $this->hasMany('App\Product');
	}
}
