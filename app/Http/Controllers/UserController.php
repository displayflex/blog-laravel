<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function signUp(Request $request)
	{
		return 'User register page';
	}

	public function signIn(Request $request)
	{
		return 'User sign-in page';
	}

	public function signOut(Request $request)
	{
		return 'User sign-out action';
	}
}
