<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;

class MainController extends Controller
{
	public function index()
	{
		$posts = Cache::remember('mainPosts', env('CACHE_TIME', 0), function () {
			return Post::with(['tags', 'user'])
				->get()
				->sortByDesc('updated_at');
		});

		return view('layouts.primary', [
			'page' => 'pages.index',
			'title' => 'Laravel-blog',
			'posts' => $posts ?? []
		]);
	}

	public function feedback()
	{
		return view('layouts.secondary', [
			'page' => 'pages.feedback',
			'title' => 'Laravel-blog | Обратная связь'
		]);
	}

	// public function feedbackPost(FeedbackRequest $request)
	// {
	// 	/**
	// 	 * Send email without events and listeners
	// 	 */
	// 	// Mail::to('3ton2004@mail.ru')
	// 	// 	->send(new FeedbackMail($request->all()));

	// 	event(new FeedbackWasCreated($request->all()));

	// 	return view('layouts.secondary', [
	// 		'page' => 'parts.feedback-success',
	// 		'title' => 'Laravel-blog | Сообщение отправлено'
	// 	]);
	// }
}
