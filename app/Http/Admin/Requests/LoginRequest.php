<?php namespace App\Http\Admin\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return TRUE;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$rules = [
			'email'    => ['required', 'email'],
			'password' => ['required']
		];

		return $rules;
	}
}
