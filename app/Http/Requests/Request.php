<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;

abstract class Request extends FormRequest {
	/**
	 * Validate the input.
	 *
	 * @param  Factory $factory
	 * @return Validator
	 */
	public function validator(Factory $factory) {
		return $factory->make(
			$this->sanitizeInput(),
			$this->container->call([$this, 'rules']),
			$this->messages(),
			$this->attributes()
		);
	}

	/**
	 * Sanitize the input.
	 *
	 * @return array
	 */
	protected function sanitizeInput() {
		if (method_exists($this, 'sanitize')) {
			return $this->container->call([$this, 'sanitize']);
		}

		return $this->all();
	}
}
