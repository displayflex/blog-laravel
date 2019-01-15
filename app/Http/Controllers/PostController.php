<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Repositories\TagHandleRepository;
use Illuminate\Support\Facades\Cache;
use App\Models\Section;

class PostController extends Controller
{
	public function show($slug)
	{
		$post = Post::where('slug', $slug)->with(['user', 'tags'])->firstOrFail();
		$post->views_count += 1;
		$post->save();

		return view('layouts.primary', [
			'page' => 'pages.post',
			'title' => 'Laravel-blog | Просмотр поста',
			'post' => $post
		]);
	}

	public function create()
	{
		$sections = Section::all();

		return view('layouts.secondary', [
			'page' => 'pages.post-add',
			'title' => 'Laravel-blog | Добавить пост',
			'sections' => $sections
		]);
	}

	public function store(PostRequest $request, TagHandleRepository $tagHandleRepository)
	{
		$id = Auth::user()->id ?? null;
		$user = User::findOrFail($id);

		$tags = explode(',', $request->input('tags'));
		$tagsIds = $tagHandleRepository->handle($tags);

		$sectionId = Section::where('name', $request->input('section'))->firstOrFail()->id;

		$post = $user->posts()->create([
			'title' => $request->input('title'),
			'content' => $request->input('content'),
			'section_id' => $sectionId
		]);

		/**
		 * Синхронизированное присоединение нескольких тегов к статье (при повторе вставлять не будет)
		 */
		$post->tags()->sync($tagsIds);

		Cache::forget('mainPosts');
		Cache::forget('tags');
		Cache::forget('sectionList');

		return redirect()->route('site.post.show', $post->slug);
	}

	public function edit($slug)
	{
		$post = Post::with('section')->where('slug', $slug)->firstOrFail();
		$sections = Section::all();

		if ($post->user->id !== Auth::user()->id) {
			return redirect()->back();
		}

		return view('layouts.secondary', [
			'page' => 'pages.post-edit',
			'title' => 'Laravel-blog | Редактировать пост',
			'post' => $post,
			'sections' => $sections
		]);
	}

	public function update(PostRequest $request, $slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();

		if ($post->user->id !== Auth::user()->id) {
			return redirect()->back();
		}

		$sectionId = Section::where('name', $request->input('section'))->firstOrFail()->id;

		$post->update([
			'title' => $request->input('title'),
			'content' => $request->input('content'),
			'slug' => null,
			'section_id' => $sectionId
		]);

		Cache::forget('mainPosts');
		Cache::forget('popularPost');
		Cache::forget('tags');
		Cache::forget('sectionList');

		return redirect()->route('site.post.show', $post->slug);
	}

	public function destroy($slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();

		if ($post->user->id !== Auth::user()->id) {
			return redirect()->back();
		}

		$post->delete();

		Cache::forget('mainPosts');
		Cache::forget('popularPost');
		Cache::forget('tags');
		Cache::forget('sectionList');

		return redirect()->route('site.main.index');
	}
}
