<?php namespace App\Http\Admin\Requests;

use App\Http\Requests\Request;
use App\Models\Level;

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
			'faq_category_id' => ['required'],
			'question'        => ['required'],
			'answer'          => ['required'],
			'status'          => ['required']
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
			'faq_category_id.required'  => 'FAQ Category is required.',
			'question.required'         => 'Question is required.',
			'answer.required'           => 'Answer is required.',
			'status.required'           => 'Status is required.'
		];
	}
}
