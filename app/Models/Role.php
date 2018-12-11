<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function users()
	{
		return $this->belongsToMany('App\Models\User');
	}

	public function permissions()
	{
		return $this->belongsToMany('App\Models\Permission');
	}
}
