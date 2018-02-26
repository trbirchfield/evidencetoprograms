<?php namespace App\Http\Client\Controllers;

use App\Http\Client\Requests\ContactRequest;
use Mail;

class ContactController extends BaseController {
	/**
	 * Contact page.
	 *
	 * @return Response
	 */
	public function getIndex() {
		$page_title   = 'Contact Us';
		$body_classes = ['document'];

		return view('client::contact.index', compact('page_title', 'body_classes'));
	}

	/**
	 * Handle contact form post.
	 *
	 * @param  ContactRequest $request
	 * @return Response
	 */
	public function postIndex(ContactRequest $request) {
		// Set input
		$input = $request->all();

		// Auto reply
		Mail::send('client::emails.auto_reply', ['name' => $input['name']], function($m) use($input) {
			$m->to($input['email']);
			$m->from(config('site.client.emails.info'), config('site.client.company_name'));
			$m->subject('Thank you for contacting ' . config('site.client.company_name'));
		});

		// Email client
		Mail::send('client::emails.contact_client', compact('input'), function($m) use($input) {
			$m->to(config('site.client.emails.info'));
			$m->from('noreply@evidencetoprograms.com', config('site.client.company_name'));
			$m->sender(config('site.client.emails.info'), config('site.client.company_name'));
			$m->subject($input['name'] . ' has contacted us.');
		});

		// Reload form with success message
		return redirect()->back()->with('message', 'Thank you for sharing your feedback with us. We will review your message and provide a response promptly.');
	}
}
