<?php namespace app\Services;

use Illuminate\Validation\Validator;

class Validation extends Validator {
	/**
	 * Validate that a password matches requirements.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  mixed   $parameters
	 * @return bool
	 */
	public function validatePassword($attribute, $value, $parameters) {
		return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*\W).{8,}$/', $value);
	}

	/**
	 * Validate that a phone number matches specific format.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  mixed   $parameters
	 * @return bool
	 */
	public function validatePhone($attribute, $value, $parameters) {
		return preg_match('/^\(\d{3}\)[\s]\d{3}[-]\d{4}$/', $value);
	}
}
