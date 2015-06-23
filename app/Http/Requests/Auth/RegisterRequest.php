<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username' => 'max:30|alpha|unique:users',
			'email' => 'email|max:255|unique:users',
			'password' => 'min:8|confirmed',
		];
	}

}
