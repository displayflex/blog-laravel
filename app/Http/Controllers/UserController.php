<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SignInRequest;

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

	public function signUpPost(SignInRequest $request)
	{
		// $validator = \Validator::make($request->all(), [
		// 	'login' => 'max:255|min:3',
		// 	'email' => 'required|max:255|email|unique:users',
		// 	'password' => 'required|max:255|min:6',
		// 	'submitPassword' => 'required|same:password',
		// 	'phone' => 'numeric|digits_between:6,16',
		// 	'isConfirmed' => 'accepted'
		// ]);

		// if ($validator->fails()) {
		// 		return redirect('user/sign-up')
		// 								->withErrors($validator)
		// 								->withInput();
		// }

		DB::table('users')->insert([
			'login' => $request->input('login'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
			'phone' => $request->input('phone', null),
		]);

		return redirect()->route('site.post.index');
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

	public function signInPost(Request $request)
	{

	}

	public function signOut(Request $request)
	{
		return 'User sign-out action';
	}
}
