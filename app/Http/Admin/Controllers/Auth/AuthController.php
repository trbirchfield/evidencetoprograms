<?php namespace App\Http\Admin\Controllers\Auth;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\Http\Admin\Requests\LoginRequest;
use App\Http\Admin\Controllers\BaseController;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;

class AuthController extends BaseController {
	/**
	 * Traits
	 */
	use AuthenticatesAndRegistersUsers;

	/**
	 * Get the path to the login route.
	 *
	 * @var string
	 */
	protected $loginPath = '/admin/auth/login';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar) {
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest.admin', ['except' => 'getLogout']);
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin() {
		return view('admin::auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \App\Http\Admin\Requests\LoginRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(LoginRequest $request) {
		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember'))) {
			if (Request::ajax() or Request::wantsJson()) {
				return response('Logged in.', 200);
			}

			return redirect()->intended($this->redirectPath());
		}

		if (Request::ajax() or Request::wantsJson()) {
			return response($this->getFailedLoginMessage(), 401);
		}

		return redirect($this->loginPath())->withInput($request->only('email', 'remember'))->withErrors([
			'email' => $this->getFailedLoginMessage(),
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout() {
		$this->auth->logout();

		return redirect('/admin');
	}
}
