<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
			'email' => 'required|max:255|email',
			'name' => 'nullable|max:20|min:2',
			'surname' => 'nullable|max:20|min:2',
			'phone' => 'nullable|numeric|digits_between:6,15',
			'birthdate' => 'nullable|date_format:Y-m-d|before:today'
		];
	}
}
