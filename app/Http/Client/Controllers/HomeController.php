<?php namespace App\Http\Client\Controllers;

use App\Models\Announcement;

class HomeController extends BaseController {
	/**
	 * Home page.
	 *
	 * @return Response
	 */
	public function getIndex() {
		// Setup
		$page_title        = 'Toolkit on Evidence-Based Programming for Seniors';
		$meta_description  = 'Evidence-based Programming for Seniors: Your comprehensive guide and toolkit to select, plan, market, implement, &amp; evaluate sustainable EBP\'s in the community.';
		$meta_keywords     = 'EBP, evidence based program, Community organizations, Seniors, advantages and disadvantages, funding for EBP, implementation of EBP, program evaluation, adapting EBPs, sustainability of EBPs, using lay leaders for EBP, marketing your program, planning for EBP, selecting an EBP';
		$announcements     = Announcement::getModel()->getHomepageAnnouncements();
		$new_announcements = Announcement::getModel()->newHomepageAnnouncements();

		return view('client::home.index', compact('page_title', 'meta_description', 'meta_keywords', 'announcements', 'new_announcements'));
	}
}
