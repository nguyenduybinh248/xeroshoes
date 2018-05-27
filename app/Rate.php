<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //
	protected $table = 'rates';
	protected $fillable = [
		'product_id','user_id','content','star','status'
	];
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
	public function reply()
	{
		return $this->hasMany('App\Reply');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
