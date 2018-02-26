<?php namespace App\Http\Api\Requests;

use App\Http\Requests\Request;
use App\Models\Status;

class FAQsRequest extends Request {
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
			'title'  => ['required'],
			'status' => ['required', ('in:' . Status::ACTIVE . ',' . Status::INACTIVE)]
		];
		$rules['title'][] = (!empty($this->input['id'])) ? ('unique:faqs,title,' . $this->input['id']) : 'unique:faqs';

		return $rules;
	}

	/**
	 * Sanitize input before validation.
	 *
	 * @return array
	 */
	public function sanitize() {
		// NOTE: example usage
		$input = $this->all();
		$input['title'] = trim($input['title']);
		$this->replace($input);

		return $this->all();
	}
}
