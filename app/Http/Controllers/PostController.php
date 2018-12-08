<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CounterInterface;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tag;


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

	public function addPost(PostRequest $request)
	{
		$id = Auth::user()->id ?? null;
		$user = User::findOrFail($id);

		$tags = explode(',', $request->input('tags'));
		$processedTags = [];

		/**
		 * Убирает пробелы по краям, преобразует все слова в нижний регистр с первой заглавной буквой.
		 */
		foreach ($tags as $key => $value) {
			$processedTags[$key] = mb_convert_case(mb_strtolower(trim($value)), MB_CASE_TITLE, "UTF-8");
		}

		/**
		 * Добавляет теги в БД, при условии что такого тега нет в БД
		 */
		foreach ($processedTags as $key => $value) {
			if (!Tag::where('name', $value)->first()) {
				Tag::create([
					'name' => $value
				]);
			}
		}

		$tagsIds = [];
		foreach ($processedTags as $key => $value) {
			$tagsIds[$key] = Tag::where('name', $value)->first()->id;
		}

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
