<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancelEmail extends Model
{
    //
	protected $table = 'cancel_emails';
	protected $fillable = [
		'order_id','status','reason','attempt'
	];
	public function order() {
		return $this->hasOne('App\Order', 'id', 'order_id');
	}
}
