<?php namespace App\Providers;

use App\Services\Validation;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		// Add namespaces for our views
		$this->app['view']->addNamespace('admin', base_path() . '/resources/admin/views');
		$this->app['view']->addNamespace('client', base_path() . '/resources/client/views');

		// Custom validation
		Validator::resolver(function($translator, $data, $rules, $messages) {
			return new Validation($translator, $data, $rules, $messages);
		});
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

		$this->app->bindShared('growl', function() {
			return $this->app->make('App\Wlion\Growl');
		});
	}
}
