<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use SoftDeletes;

	protected $guarded = ['id', 'email_verified_at', 'created_at', 'updated_at', 'deleted_at'];
}
