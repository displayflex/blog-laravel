<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CounterInterface;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tag;
use App\Repositories\TagHandleRepository;


class PostController extends Controller
{
	public function index(Request $request)
	{
		$posts = Post::all()
			->sortByDesc('updated_at');

		return view('layouts.primary', [
			'page' => 'pages.index',
			'title' => 'Laravel-blog',
			'posts' => $posts ?? []
		]);
	}

	public function post(Request $request, $id)
	{
		$post = Post::findOrFail($id);

		return view('layouts.primary', [
			'page' => 'pages.post',
			'title' => 'Laravel-blog | Просмотр поста',
			'post' => $post
		]);
	}

	public function add(Request $request)
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

		return redirect()->route('site.post.post', $post->id);
	}

	public function edit(Request $request, $id)
	{
		$post = Post::findOrFail($id);

		return view('layouts.secondary', [
			'page' => 'pages.post-edit',
			'title' => 'Laravel-blog | Редактировать пост',
			'post' => $post
		]);
	}

	public function editPost(PostRequest $request, $id)
	{
		$post = Post::findOrFail($id);
		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->save();

		return redirect()->route('site.post.post', $post->id);
	}

	public function delete(Request $request, $id)
	{
		$post = Post::findOrFail($id);
		$post->delete();

		return redirect()->route('site.post.index');
	}

	public function tag(Request $request, $id)
	{
		$tag = Tag::findOrFail($id);
		$posts = $tag->posts->sortByDesc('updated_at');

		return view('layouts.primary', [
			'page' => 'pages.index',
			'title' => 'Laravel-blog',
			'tagName' => $tag->name,
			'posts' => $posts ?? []
		]);
	}
}

// TODO: проверить что бы не было подключений к БД из шаблнов
// TODO: отдельный контроллер для тегов??
// TODO: добавить views_count
// TODO: добавить picture
