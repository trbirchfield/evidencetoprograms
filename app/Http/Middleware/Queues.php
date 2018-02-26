<?php namespace App\Http\Middleware;

use App;
use Closure;

class Queues {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if ($request->input('queue_token') != config('queue.connections.iron.token')) {
			return App::abort(401, 'Access Denied');
		}

		return $next($request);
	}
}
