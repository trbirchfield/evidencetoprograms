<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider {
	/**
	 * Define all view composers.
	 *
	 * @return void
	 */
	public function boot() {
		View::composer('admin::layouts.*',            'App\Http\Admin\Composers\LayoutsComposer');
		View::composer('admin::partials.breadcrumbs', 'App\Http\Admin\Composers\BreadcrumbsComposer');
		View::composer('client::layouts.*',           'App\Http\Client\Composers\LayoutsComposer');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
