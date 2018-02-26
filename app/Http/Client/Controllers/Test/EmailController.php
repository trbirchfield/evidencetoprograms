<?php namespace App\Http\Client\Controllers\Test;

use Mail;

class EmailController extends BaseController {
	public function getIndex() {

		$name = 'Mike';

		Mail::send('client::emails.auto_reply', compact('name'), function($m) {
			$m->to('ma@wlion.com');
			$m->from(config('site.client.emails.info'), config('site.client.company_name'));
			$m->subject('testing Mail::send');
		});

		// Mail::queue('client::emails.auto_reply', compact('name'), function($m) {
		// 	$m->to('ma@wlion.com');
		// 	$m->from(config('site.client.emails.info'), config('site.client.company_name'));
		// 	$m->subject('testing Mail::queue');
		// });

		return date('r');
	}
}
