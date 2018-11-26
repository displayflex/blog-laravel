<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index(Request $request)
	{
		return 'Index page with all posts';
	}

	public function post(Request $request, $id)
	{
		return 'One post page with post-id: ' . $id;
	}

	public function add(Request $request)
	{
		return 'Add post page';
	}

	public function edit(Request $request, $id)
	{
		return 'Edit post page with post-id: ' . $id;
	}

	public function delete(Request $request, $id)
	{
		return 'Delete Post with post-id: ' . $id;
	}
}
