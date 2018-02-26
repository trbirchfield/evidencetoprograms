<?php namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Http\Request;

class Api {
	/**
	 * Handle an incoming request.
	 *
	 * @param  Request $request
	 * @param  Closure $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next) {
		// Stateless
		// TODO: this is causing errors in 5, how else to achieve stateless session
		// Config::set('session.driver', 'array');

		// TODO: authentication

		return $next($request);
	}
}
