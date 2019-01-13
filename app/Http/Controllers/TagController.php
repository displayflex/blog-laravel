<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
	public function index()
	{
		$tags = Tag::withCount('posts')
			->has('posts')
			->orderBy('posts_count', 'DESC')
			->get();

		return view('layouts.primary', [
			'page' => 'pages.tags',
			'title' => 'Laravel-blog | Тэги',
			'allTags' => $tags
		]);
	}

	public function show($slug)
	{
		$tag = Tag::where('slug', $slug)->firstOrFail();
		$posts = $tag->posts()->orderBy('updated_at', 'desc')->paginate(5);

		return view('layouts.primary', [
			'page' => 'pages.index',
			'title' => 'Laravel-blog',
			'tagName' => $tag->name,
			'posts' => $posts ?? []
		]);
	}
}
