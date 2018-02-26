<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider {
	/**
	 * Register bindings.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(
			'App\Repositories\WidgetRepository',
			'App\Repositories\WidgetRepositoryEloquent'
		);
		$this->app->bind(
			'App\Repositories\GizmoRepository',
			'App\Repositories\GizmoRepositoryEloquent'
		);
		$this->app->bind(
			'App\Repositories\PartyRepository',
			'App\Repositories\PartyRepositoryEloquent'
		);
		$this->app->bind(
			'App\Repositories\StateRepository',
			'App\Repositories\StateRepositoryEloquent'
		);
		$this->app->bind(
			'App\Repositories\UserRepository',
			'App\Repositories\UserRepositoryEloquent'
		);
		$this->app->bind(
			'App\Repositories\PlankRepository',
			'App\Repositories\PlankRepositoryEloquent'
		);
	}
}
