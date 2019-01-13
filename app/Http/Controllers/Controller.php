<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Section;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		$this->renderSharedViews();
	}

	public function renderSharedViews()
	{
		View::share('sectionList', Cache::remember('sectionList', env('CACHE_TIME', 0), function () {
			return view('parts.widgets.shared.shared-section-list', [
				// 'sections' => Section::all()
				'sections' => Section::withCount('posts')
					->has('posts')
					->orderBy('posts_count', 'DESC')
					->take(5)
					->get()
			])->render();
		}));

		View::share('popularPost', Cache::remember('popularPost', env('CACHE_TIME', 0), function () {
			return view('parts.widgets.shared.shared-popular-post', [
				'post' => Post::orderBy('views_count', 'DESC')->first()
			])->render();
		}));

		View::share('tags', Cache::remember('tags', env('CACHE_TIME', 0), function () {
			return view('parts.widgets.shared.shared-tags', [
				'tags' => Tag::withCount('posts')
					->has('posts')
					->orderBy('posts_count', 'DESC')
					->take(8)
					->get()
			])->render();
		}));
	}
}
