<?php namespace App\Http\Admin\Controllers;

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
		return view('admin::auth.login');
	}

	/**
	 * Handle login attempt.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function postIndex(Request $request) {
		// Too many failed attempts?
		$key = 'failed_login.admin.' . $request->ip() . '.' . $request->input('email');
		$failed_attempts = Cache::get($key, 0);
		if ($failed_attempts == 5) {
			return redirect()->back()->with('error', 'Too many failed attempts. Try again in few minutes.');
		}

		// Attempt login
		if (Auth::attempt($request->only('email', 'password'), ($request->has('remember')) ? $request->input('remember') : FALSE)) {
			Cache::forget($key);
			return redirect()->intended('admin');
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
		Config::set('auth.password.email', 'admin::emails.password');
		$res = Password::sendResetLink($request->only('email'), function($m) {
			$m->subject('Admin Password Reminder');
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
		return view('admin::auth.reset', compact('token'));
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
				return redirect()->route('admin.login')->with('message', 'Password has been reset.');
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
		return redirect()->route('admin.login');
	}
}
