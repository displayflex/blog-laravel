<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function signUp(Request $request)
	{
		return view('layouts.secondary', [
			'page' => 'pages.sign-up',
			'title' => $title ?? 'Laravel-blog',
			'formBuilder' => $formBuilder ?? [],
			'msg' => $msg ?? ''
		]);
	}

	public function signIn(Request $request)
	{
		return view('layouts.secondary', [
			'page' => 'pages.sign-in',
			'title' => $title ?? 'Laravel-blog',
			'formBuilder' => $formBuilder ?? [],
			'msg' => $msg ?? ''
		]);
	}

	public function signOut(Request $request)
	{
		return 'User sign-out action';
	}
}
