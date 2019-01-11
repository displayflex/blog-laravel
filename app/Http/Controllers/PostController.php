<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tag;
use App\Repositories\TagHandleRepository;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
	public function post($slug)
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

	public function add()
	{
		return view('layouts.secondary', [
			'page' => 'pages.post-add',
			'title' => 'Laravel-blog | Добавить пост'
		]);
	}

	public function addPost(PostRequest $request, TagHandleRepository $tagHandleRepository)
	{
		$id = Auth::user()->id ?? null;
		$user = User::findOrFail($id);

		$tags = explode(',', $request->input('tags'));
		$tagsIds = $tagHandleRepository->handle($tags);

		$post = $user->posts()->create([
			'title' => $request->input('title'),
			'content' => $request->input('content')
		]);

		/**
		 * Синхронизированное присоединение нескольких тегов к статье (при повторе вставлять не будет)
		 */
		$post->tags()->sync($tagsIds);

		Cache::forget('mainPosts');
		Cache::forget('tags');

		return redirect()->route('site.post.post', $post->slug);
	}

	public function edit($slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();

		if ($post->user->id !== Auth::user()->id) {
			return redirect()->back();
		}

		return view('layouts.secondary', [
			'page' => 'pages.post-edit',
			'title' => 'Laravel-blog | Редактировать пост',
			'post' => $post
		]);
	}

	public function editPost(PostRequest $request, $slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();

		if ($post->user->id !== Auth::user()->id) {
			return redirect()->back();
		}

		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->slug = null;
		$post->save();

		Cache::forget('mainPosts');
		Cache::forget('popularPost');
		Cache::forget('tags');

		return redirect()->route('site.post.post', $post->slug);
	}

	public function delete($slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();

		if ($post->user->id !== Auth::user()->id) {
			return redirect()->back();
		}

		$post->delete();

		Cache::forget('mainPosts');
		Cache::forget('popularPost');
		Cache::forget('tags');

		return redirect()->route('site.main.index');
	}
}
