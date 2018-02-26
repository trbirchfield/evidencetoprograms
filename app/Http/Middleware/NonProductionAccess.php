<?php namespace App\Http\Middleware;

use App;
use Closure;
use Config;
use Illuminate\Http\Request;

class NonProductionAccess {
	/**
	 * Handle an incoming request.
	 *
	 * @param  Request $request
	 * @param  Closure $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next) {
		if (!in_array(App::environment(), ['production', 'testing'])) {
			$authenticated = FALSE;
			$trusted_ips   = ['10.1.80', '10.2.80', '192.168.1', '192.168.10', '97.77.8.162'];
			$logins        = [
				['u' => 'wlion', 'p' => 'm3Y3_dev.21'],
				['u' => 'swep',  'p' => 'review']
			];
			if (in_array(substr($_SERVER['REMOTE_ADDR'], 0, strrpos($_SERVER['REMOTE_ADDR'], '.')), $trusted_ips)) {
				$authenticated = TRUE;
			} elseif (in_array($_SERVER['REMOTE_ADDR'], $trusted_ips)) {
				$authenticated = TRUE;
			} elseif (isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW'])) {
				foreach ($logins as $login) {
					if ($_SERVER['PHP_AUTH_USER'] === $login['u'] and $_SERVER['PHP_AUTH_PW'] === $login['p']) {
						$authenticated = TRUE;
						break;
					}
				}
			}
			if (!$authenticated) {
				header('WWW-Authenticate: Basic realm="Authentication Required"');
				header('HTTP/1.0 401 Unauthorized');
				die('Access Denied');
			}
		}

		return $next($request);
	}
}
