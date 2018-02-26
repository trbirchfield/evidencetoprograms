<?php namespace App\Http\Client\Controllers\Test;

class StyleguideController extends BaseController {
	/**
	 * Styleguide.
	 *
	 * @return Response
	 */
	public function getIndex() {
		$page_title = 'Styleguide';

		return view('client::test.styleguide', compact('page_title'));
	}
}
