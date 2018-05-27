<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    //
	use Searchable;
	protected $table = 'categories';
	protected $fillable = [
		'name'
	];
	public function products()
	{
		return $this->hasMany('App\Product');
	}
}
