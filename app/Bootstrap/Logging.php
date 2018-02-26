<?php namespace App\Bootstrap;

use Illuminate\Log\Writer;
use Monolog\Logger as Monolog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\ConfigureLogging;

class Logging extends ConfigureLogging {
	/**
	 * Configure the Monolog handlers for the application.
	 *
	 * @param  \Illuminate\Contracts\Foundation\Application  $app
	 * @param  \Illuminate\Log\Writer  $log
	 * @return void
	 */
	protected function configureDailyHandler(Application $app, Writer $log) {
		$log->useDailyFiles($app->storagePath() . '/logs/log-' . php_sapi_name() . '.log', 5);
	}
}
