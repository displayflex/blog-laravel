<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CounterInterface;
use App\Http\Requests\PostRequest;
use App\Models\Post;


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
		$post = Post::create([
			'title' => $request->input('title'),
			'content' => $request->input('content'),
		]);

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

	// TODO: delete this
	public function test(Request $request, CounterInterface $counter)
	{
		echo getRusDate(date("2018-10-06 17:42:17"));
		echo '<br><br>';

		// $counter = resolve('CounterSingleton');
		// echo $counter->getValue() . '<br>';
		// $counter->increment();
		// echo $counter->getValue(). '<br>';

		// $counter2 = resolve('CounterSingleton');
		// echo $counter2->getValue() . '<br>';

		// $counter3 = resolve('CounterBind');
		// echo $counter3->getValue() . '<br>';


		echo $counter->getValue() . '<br>';
		$counter->increment();
		echo $counter->getValue() . '<br>';


		return view('layouts.primary', [
			'page' => 'pages.index',
			'title' => $title ?? 'Laravel-blog',
			'posts' => $posts ?? []
		]);
	}
}
