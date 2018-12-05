<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'login' => 'max:255|min:3',
			'email' => 'required|max:255|email|unique:users',
			'password' => 'required|max:255|min:6',
			'submitPassword' => 'required|same:password',
			// 'phone' => 'regex:/\+\d{1}\s{1}\(\d{3}\)\s{1}\d{3}\-\d{2}\-\d{2}/',
			'phone' => 'numeric|digits_between:6,16',
			'isConfirmed' => 'accepted'
		];
	}
}
