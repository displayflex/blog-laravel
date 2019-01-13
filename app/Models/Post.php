<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable;

	protected $guarded = ['id', 'user_id', 'views_count', 'created_at', 'updated_at'];

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Models\Tag');
	}

	public function section()
	{
		return $this->belongsTo('App\Models\Section');
	}
}
