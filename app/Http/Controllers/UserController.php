<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function signUp(Request $request)
	{
		// return 'User register page';
		return view(
			'user.sign-up',
			[
				'title' => $title ?? 'Laravel-blog',
				'formBuilder' => $formBuilder ?? [],
				'msg' => $msg ?? ''
			]
		);
	}

	public function signIn(Request $request)
	{
		// return 'User sign-in page';
		return view(
			'user.sign-in',
			[
				'title' => $title ?? 'Laravel-blog',
				'formBuilder' => $formBuilder ?? [],
				'msg' => $msg ?? ''
			]
		);
	}

	public function signOut(Request $request)
	{
		return 'User sign-out action';
	}
}
