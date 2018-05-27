<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'users';
	protected $fillable = [
		'name', 'email', 'password','address','phone','avatar','first_name','last_name','provider','provider_id','slug'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function intersted_products() {
		return $this->belongsToMany('App\Product','intersted_products','user_id','product_id');
	}
	public function watched_products() {
		return $this->belongsToMany('App\Product','watched_products','user_id','product_id');
	}
	public function orders()
	{
		return $this->hasMany('App\Order');
	}
	public function rates()
	{
		return $this->hasMany('App\Rate');
	}
	public function replies()
	{
		return $this->hasMany('App\Reply');
	}
}
