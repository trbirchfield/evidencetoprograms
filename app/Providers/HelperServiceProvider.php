<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider {
	/**
	 * Register our custom helpers.
	 *
	 * @return void
	 */
	public function register() {
		$files = glob(app_path() . '/Helpers/*.php');
		foreach ($files as $file) {
			require_once($file);
		}
	}
}
