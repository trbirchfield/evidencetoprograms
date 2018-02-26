<?php namespace App\Wlion\Auth;

use Auth;
use Cache;
use Password;
use Request;

trait AuthenticatesUsers {
	/**
	 * Handle login attempt.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function postLogin(Request $request) {
		// Too many failed attempts?
		$key = 'failed_login.' . $request->getClientIp() . '.' . $request->input('email');
		$failed_attempts = Cache::get($key, 0);
		if ($failed_attempts == 5) {
			return redirect()->back()->with('error', 'Too many failed attempts. Try again in few minutes.');
		}

		// Attempt login
		if (Auth::attempt($request->only('email', 'password'), ($request->has('remember')) ? $request->input('remember') : FALSE)) {
			Cache::forget($key);
			return redirect()->intended($this->redirectTo);
		}

		// Failed
		Cache::put($key, ++$failed_attempts, 5);
		return redirect()->back()->with('error', 'Login failed.');
	}

	/**
	 * Handle recover password request.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function postRecover(Request $request) {
		$this->validate($request, ['email' => 'required|email']);

		$res = Password::sendResetLink($request->only('email'), function($m) {
			$m->subject($this->getEmailSubject());'Password Reminder'
		});

		switch ($response)
		{
			case PasswordBroker::RESET_LINK_SENT:
				return redirect()->back()->with('status', trans($response));

			case PasswordBroker::INVALID_USER:
				return redirect()->back()->withErrors(['email' => trans($response)]);
		}





		// Attempt to set reminder and return
		Config::set('auth.reminder.email', 'admin::emails.password_reminder');
		$res = Password::remind($request->only('email'), function($m) {
			$m->subject('Password Reminder');
		});
		return redirect()->back()->with('message', 'Login failed.');
		return Response::json([
			'message' => Lang::get($res)
		], ($res == Password::REMINDER_SENT) ? 200 : 422);
	}

	/**
	 * Get the login route.
	 *
	 * @return string
	 */
	public function loginAt() {
		return route((property_exists($this, 'login_at')) ? $this->login_at : 'login');
	}

	/**
	 * Get the redirect route.
	 *
	 * @return string
	 */
	public function redirectTo() {
		return route((property_exists($this, 'redirect_to')) ? $this->redirect_to : 'home');
	}
}
