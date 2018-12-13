<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	protected $table = 'feedbacks';
	protected $guarded = ['id', 'user_id', 'created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
