<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function signUp(Request $request)
	{
		return view('layouts.secondary', [
			'page' => 'pages.sign-up',
			'title' => 'Laravel-blog | Регистрация'
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
			'title' => 'Laravel-blog | Вход'
		]);
	}

	public function signInPost(Request $request)
	{
		$login = $request->input('login');
		$password = $request->input('password');
		$remember = $request->input('remember') ? true : false;

		if (Auth::attempt(['login' => $login, 'password' => $password], $remember)) {
			return redirect()->intended('/');
		} else {
			return redirect()->back()->withInput()->withErrors([
				'msg' => 'Неверный логин или пароль',
			]);
		}
	}

	public function signOut(Request $request)
	{
		Auth::logout();

		return redirect()->route('site.post.index');
	}
}
