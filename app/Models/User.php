<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	use Notifiable;
	use SoftDeletes;

	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
	protected $hidden = ['password', 'remember_token'];

	public function profile()
	{
		return $this->hasOne('App\Models\Profile');
	}

	public function posts()
	{
		return $this->hasMany('App\Models\Post');
	}

	public function feedbacks()
	{
		return $this->hasMany('App\Models\Feedback');
	}

	public function roles()
	{
		return $this->belongsToMany('App\Models\Role');
	}
}
