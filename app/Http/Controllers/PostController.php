<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CounterInterface;


class PostController extends Controller
{
	public function index(Request $request)
	{
		return view('layouts.primary', [
			'page' => 'pages.index',
			'title' => $title ?? 'Laravel-blog',
			'posts' => $posts ?? []
		]);
	}

	public function post(Request $request, $id)
	{
		return view('layouts.primary', [
			'page' => 'pages.post',
			'title' => $title ?? 'Laravel-blog',
			'post' => $post ?? ['title' => 'Lorem ipsum dolor sit amet.', 'date' => 'lorem', 'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, voluptatibus?'],
			'id' => $id ?? ''
		]);
	}

	public function add(Request $request)
	{
		return view('layouts.primary', [
			'page' => 'pages.post-add',
			'title' => $title ?? 'Laravel-blog',
			'formBuilder' => $formBuilder ?? [],
			'msg' => $msg ?? ''
		]);
	}

	public function edit(Request $request, $id)
	{
		return view('layouts.primary', [
			'page' => 'pages.post-edit',
			'title' => $title ?? 'Laravel-blog',
			'formBuilder' => $formBuilder ?? [],
			'msg' => $msg ?? '',
			'id' => $id ?? ''
		]);
	}

	public function delete(Request $request, $id)
	{
		return 'Delete Post with post-id: ' . $id;
	}

	// TODO: delete this
	public function test(Request $request, CounterInterface $counter)
	{
		// TODO: перенести в шаблоны
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
