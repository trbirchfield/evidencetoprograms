<?php namespace App\Http\Admin\Controllers;

class DashboardController extends BaseController {
	/**
	 * Dashboard page.
	 *
	 * @return Response
	 */
	public function getIndex() {
		$page_title = 'Dashboard';

		return view('admin::dashboard', compact('page_title'));
	}
}
