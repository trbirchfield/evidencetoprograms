<?php namespace App\Http\Client\Controllers\Test;

use Config;
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
	 * Set the redirect route used on success.
	 *
	 * @var string
	 */
	protected $redirectTo = '/test/login';

	/**
	 * Create a new password controller instance.
	 *
	 * @param  Guard  $auth
	 * @param  PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords) {
		$this->auth      = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');

		Config::set('auth.password.email', 'client::test.email_password_reset_link');
	}
}
