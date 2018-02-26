<?php namespace App\Http\Client\Requests\Test;

use App\Http\Requests\Request;

class FormRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		// Spam check
		if ($this->has('email_trap_123')) {
			return FALSE;
		}

		return TRUE;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$rules = [
			'name'    => ['required', 'min:4', 'max:10'],
			'email'   => ['required', 'email'],
			'message' => ['required']
		];

		return $rules;
	}

	/**
	 * Get the custom messages for this request.
	 *
	 * @return array
	 */
	public function messages() {
		return [
			'name.required'    => 'Please enter your name.',
			'name.min'         => 'Name must have at least 4 characters.',
			'name.max'         => 'Name must be no longer than 10 characters.',
			'email.required'   => 'An email address is required.',
			'email.email'      => 'Please enter a valid email address.',
			'message.required' => 'Please enter a message.'
		];
	}
}
