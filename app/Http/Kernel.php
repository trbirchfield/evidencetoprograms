<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
	/**
	 * The bootstrap classes for the application.
	 *
	 * @var array
	 */
	protected $bootstrappers = [
		'Illuminate\Foundation\Bootstrap\DetectEnvironment',
		'Illuminate\Foundation\Bootstrap\LoadConfiguration',
		'App\Bootstrap\Logging',
		'Illuminate\Foundation\Bootstrap\HandleExceptions',
		'Illuminate\Foundation\Bootstrap\RegisterFacades',
		'Illuminate\Foundation\Bootstrap\RegisterProviders',
		'Illuminate\Foundation\Bootstrap\BootProviders',
	];

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'App\Http\Middleware\ApiSession',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession'
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth'           => 'App\Http\Middleware\Authenticate',
		'auth.admin'     => 'App\Http\Middleware\AuthenticateAdmin',
		'auth.basic'     => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest'          => 'App\Http\Middleware\RedirectIfAuthenticated',
		'guest.admin'    => 'App\Http\Middleware\RedirectIfAuthenticatedAdmin',
		'csrf'           => 'App\Http\Middleware\VerifyCsrfToken',
		'queues'         => 'App\Http\Middleware\Queues',
		'cors'           => 'App\Http\Middleware\Cors',
		'api'            => 'App\Http\Middleware\Api',
		'dev_only'       => 'App\Http\Middleware\DevOnly',
		'non_production' => 'App\Http\Middleware\NonProductionAccess',
		'candidate_only' => 'App\Http\Middleware\CandidateOnly',
		'voter_only'     => 'App\Http\Middleware\VoterOnly'
	];
}
