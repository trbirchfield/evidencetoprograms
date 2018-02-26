<?php namespace App\Http\Client\Controllers;

class SitemapController extends BaseController {
	/**
	 * Default method.
	 *
	 * @return Response
	 */
	public function getIndex() {
		$page_title = 'Site Map';

		return view('client::sitemap.index', compact('page_title'));
	}

	/**
	 * Generate an XML Sitemap.
	 * http://www.sitemaps.org/protocol.php
	 *
	 * @return xml
	 */
	public function getXml() {
		// Set domain
		$domain = config('app.url') . '/';

		// Build list of pages
		$pages = [];

		// Static pages
		$pages[] = $domain;
		$pages[] = $domain . 'home';

		// Build xml
		$xml  = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach ($pages as $v) {
			$xml .= '  <url>';
			$xml .= '    <loc>' . $v . '</loc>';
			$xml .= '    <lastmod>' . date('Y-m-d') . '</lastmod>';
			$xml .= '  </url>';
		}
		$xml .= '</urlset>';

		// Output
		return response($xml, 200, [
			'content-type' => 'application/xml'
		]);
	}
}
