<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmEmail extends Model
{
    //
	protected $table = 'confirm_emails';
	protected $fillable = [
		'order_id','status','attempt'
	];
	public function order() {
		return $this->hasOne('App\Order', 'id', 'order_id');
	}
}
