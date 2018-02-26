<?php namespace App\Http\Middleware;

use App;
use Closure;

class DevOnly {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!in_array(App::environment(), ['dev', 'testing'])) {
			return redirect()->route('home');
		}

		return $next($request);
	}
}
