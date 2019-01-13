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
	public function signUp()
	{
		Auth::logout();

		return view('layouts.secondary', [
			'page' => 'pages.sign-up',
			'title' => 'Laravel-blog | Регистрация'
		]);
	}

	public function signUpPost(SignUpRequest $request)
	{
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

		$user->roles()->sync([3, 2]);

		Auth::loginUsingId($user->id, true);

		return redirect()->route('site.main.index');
	}

	public function signIn()
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

	public function signOut()
	{
		Auth::logout();

		return redirect()->route('site.main.index');
	}

	public function profile($id)
	{
		$user = User::where('id', $id)->with('profile')->firstOrFail();

		return view('layouts.primary', [
			'page' => 'pages.profile',
			'title' => 'Laravel-blog | Профиль пользователя',
			'user' => $user
		]);
	}

	public function edit($id)
	{
		$user = User::where('id', Auth::user()->id)->with('profile')->firstOrFail();

		if ($id !== (string)$user->id) {
			return redirect()->back();
		}

		return view('layouts.secondary', [
			'page' => 'pages.user-edit',
			'title' => 'Laravel-blog | Редактировать профиль',
			'user' => $user
		]);
	}

	public function update(UserEditRequest $request, $id)
	{
		$user = User::findOrFail(Auth::user()->id);

		if ($id !== (string)$user->id) {
			return redirect()->back();
		}

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
