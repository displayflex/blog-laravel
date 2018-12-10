<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\UserEditRequest;

class UserController extends Controller
{
	public function signUp(Request $request)
	{
		Auth::logout();

		return view('layouts.secondary', [
			'page' => 'pages.sign-up',
			'title' => 'Laravel-blog | Регистрация'
		]);
	}

	public function signUpPost(SignUpRequest $request)
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

		$phone = $request->input('phone');

		$user = User::create([
			'login' => $request->input('login'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password'))
		]);

		if ($phone) {
			$profile = new Profile([
				'phone' => $phone
			]);

			$user->profile()->save($profile);
		}

		Auth::loginUsingId($user->id, true);

		return redirect()->route('site.post.index');
	}

	public function signIn(Request $request)
	{
		Auth::logout();

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

		if (Auth::attempt(['login' => $login, 'password' => $password, 'deleted_at' => null], $remember)) {
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

	public function profile(Request $request, $id)
	{
		if (!Auth::check()) {
			return abort(404);
		}

		$user = User::findOrFail($id);

		return view('layouts.primary', [
			'page' => 'pages.profile',
			'title' => 'Laravel-blog | Профиль пользователя',
			'user' => $user
		]);
	}

	public function edit(Request $request, $id)
	{
		$authId = (string)Auth::user()->id ?? null;

		if ($authId !== $id) {
			return redirect()->back();
		}

		$user = User::findOrFail($id);

		return view('layouts.secondary', [
			'page' => 'pages.user-edit',
			'title' => 'Laravel-blog | Редактировать профиль',
			'user' => $user
		]);
	}

	public function editPost(UserEditRequest $request, $id)
	{
		$authId = (string)Auth::user()->id ?? null;

		if ($authId !== $id) {
			return redirect()->back();
		}

		$user = User::findOrFail($id);

		$email = $request->input('email');
		$name = $request->input('name');
		$surname = $request->input('surname');
		$phone = $request->input('phone');
		$birthdate = $request->input('birthdate');

		$user->email = $email;

		if ($user->profile === null) {
			$profile = new Profile([
				'name' => $name,
				'surname' => $surname,
				'phone' => $phone,
				'birthdate' => $birthdate
			]);

			$user->profile()->save($profile);
		} else {
			$user->profile->update([
				'name' => $name,
				'surname' => $surname,
				'phone' => $phone,
				'birthdate' => $birthdate
			]);
		}

		$user->save();

		return redirect()->route('site.user.profile', $id);
	}
}
