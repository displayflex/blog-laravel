<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		$this->renderSharedViews();
	}

	public function renderSharedViews()
	{
		View::share('popularPost', Cache::remember('popularPost', env('CACHE_TIME', 0), function () {
			return view('parts.widgets.shared.popular-post', [
				'post' => Post::orderBy('views_count', 'DESC')->first()
			])->render();
		}));
	}
}
