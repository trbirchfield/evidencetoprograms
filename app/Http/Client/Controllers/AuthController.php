<?php namespace App\Http\Client\Controllers;

use App\Models\Status;
use Auth;
use Cache;
use Config;
use Password;
use Illuminate\Http\Request;

class AuthController extends BaseController {
	/**
	 * Login form.
	 *
	 * @return Response
	 */
	public function getIndex() {
		$page_title = 'Login';

		return view('client::auth.login', compact('page_title'));
	}

	/**
	 * Handle login attempt.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function postIndex(Request $request) {
		// Too many failed attempts?
		$key = 'failed_login.' . $request->ip() . '.' . $request->input('email');
		$failed_attempts = Cache::get($key, 0);
		if ($failed_attempts == 5) {
			return redirect()->back()->with('error', 'Too many failed attempts. Try again in few minutes.');
		}

		// Attempt login
		if (Auth::attempt($request->only('email', 'password'), ($request->has('remember')) ? $request->input('remember') : FALSE)) {
			// Clear attempt count
			Cache::forget($key);

			// Set redirect
			if ($request->has('login_from')) {

			}
			$redirect_to = (isset($redirect_to)) ? $redirect_to : route('home');

			return redirect($redirect_to);
		}

		// Failed
		Cache::put($key, ++$failed_attempts, 5);
		return redirect()->back()->with('error', 'Login failed.');
	}

	/**
	 * Handle password reset request.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function postEmail(Request $request) {
		// Validate
		$this->validate($request, ['email' => 'required|email']);

		// Attempt to send reset link
		Config::set('auth.password.email', 'client::emails.password');
		$res = Password::sendResetLink($request->only('email'), function($m) {
			$m->from(config('site.client.emails.system'), config('site.client.company_name'));
			$m->subject('Password Reset Instructions');
		});
		switch ($res) {
			case Password::RESET_LINK_SENT:
				return redirect()->back()->with('message', trans($res));
			case Password::INVALID_USER:
				return redirect()->back()->withErrors(['email' => trans($res)]);
		}
	}

	/**
	 * Password reset form.
	 *
	 * @param string $token
	 * @return Response
	 */
	public function getReset($token = NULL) {
		$page_title = 'Password Reset';

		return view('client::auth.reset', compact('page_title', 'token'));
	}

	/**
	 * Reset user password.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function postReset(Request $request) {
		// Validate
		$this->validate($request, [
			'token'    => 'required',
			'email'    => 'required|email',
			'password' => 'required|min:6|confirmed'
		]);

		// Attempt to reset password and set response
		$res = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function($user, $password) {
			$user->password = $password;
			$user->save();
		});
		switch ($res) {
			case Password::PASSWORD_RESET:
				return redirect()->route('login')->with('message', 'Password has been reset.');
			default:
				return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => trans($res)]);
		}
	}

	/**
	 * Logout request.
	 *
	 * @return Response
	 */
	public function getLogout() {
		Auth::logout();
		return redirect()->route('home');
	}
}
