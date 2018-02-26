<?php namespace App\Http\Client\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request {
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
            'name'    => ['required'],
            'email'   => ['required', 'email'],
            'help'    => ['required'],
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
            'email.required'   => 'An email address is required.',
            'email.email'      => 'Please enter a valid email address.',
            'help.required'    => 'Please tell us how we can help you.',
            'message.required' => 'Please enter a message.'
        ];
    }
}
