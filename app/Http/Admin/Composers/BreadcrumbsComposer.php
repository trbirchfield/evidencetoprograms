<?php namespace App\Http\Admin\Composers;

use Illuminate\View\View;

class BreadcrumbsComposer {
	/**
	 * Setup common output needed for layouts.
	 *
	 * @param  View $view
	 * @return void
	 */
	public function compose(View $view) {
		$default_crumbs = [[
			'name' => 'Dashboard',
			'url'  => route('admin.dashboard')
		]];
		$additional_crumbs = ($view->offsetExists('breadcrumbs')) ? $view->offsetGet('breadcrumbs') : [];
		$crumbs            = array_merge($default_crumbs, $additional_crumbs);
		$view->with([
			'crumbs'      => $crumbs,
			'crumb_count' => count($crumbs)
		]);
	}
}
