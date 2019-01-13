<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
	public function index()
	{
		$sections = Section::withCount('posts')
			->has('posts')
			->orderBy('posts_count', 'DESC')
			->get();

		return view('layouts.primary', [
			'page' => 'pages.sections',
			'title' => 'Laravel-blog | Разделы',
			'allSections' => $sections
		]);
	}

	public function show($slug)
	{
		$section = Section::where('slug', $slug)->firstOrFail();
		$posts = $section->posts()->orderBy('updated_at', 'desc')->paginate(5);

		return view('layouts.primary', [
			'page' => 'pages.index',
			'title' => 'Laravel-blog',
			'sectionName' => $section->name,
			'posts' => $posts ?? []
		]);
	}
}
