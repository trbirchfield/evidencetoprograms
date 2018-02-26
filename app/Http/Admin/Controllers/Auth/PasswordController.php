<?php namespace App\Http\Admin\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PasswordController extends Controller {
	/**
	 * Traits
	 */
	use ResetsPasswords, ValidatesRequests;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords) {
		$this->auth      = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}
}
