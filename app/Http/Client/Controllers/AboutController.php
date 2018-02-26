<?php namespace App\Http\Client\Controllers;

class AboutController extends BaseController {
	/**
	 * Home page.
	 *
	 * @return Response
	 */
	public function getIndex() {
		$page_title       = 'About Us';
		$meta_description = 'The community research center for senior health (CRC-SH) is a partnerhsip multiple academic and healthcare organizations in central Texas';
		$body_classes     = ['document'];

		return view('client::about.index', compact('page_title', 'meta_description', 'body_classes'));
	}
}
