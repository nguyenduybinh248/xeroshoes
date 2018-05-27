<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
	protected $table = 'replies';
	protected $fillable = [
		'user_id','reply','rate_id'
	];
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
	public function rate() {
		return $this->belongsTo('App\Rate');
	}
//	public function user() {
//		return $this->hasOne('App\User', 'id', 'user_id');
//	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
