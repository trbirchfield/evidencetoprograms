<?php namespace App\Http\Middleware;

use Illuminate\Contracts\Routing\Middleware;
use Closure;
use Config;

class ApiSession implements Middleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		// TODO: is this needed for stateless sessions?
		// $path = $request->getPathInfo();
		// if (strpos($path, '/api/') === 0) {
		// 	Config::set('session.driver', 'array');
		// 	Config::set('cookie.driver', 'array');
		// }

		return $next($request);
	}
}
