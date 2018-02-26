<?php namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Mailchimp;

class SubscribeController extends BaseController {
	/**
	 * Setup instance.
	 *
	 * @param  Mailchimp $mailchimp
	 * @return void
	 */
	public function __construct(Mailchimp $mailchimp) {
		$this->mailchimp = $mailchimp;
	}

	/**
	 * Process Subscription.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function postIndex(Request $request) {
		// Setup Output
		$output = [];

		try {
			// Make sure we have email input
			if (!$request->has('newsletterEmail')) {
				throw new Exception('Missing Email');
			}

			// Subscribe to newsletter
			$this->mailchimp->lists->subscribe(config('site.mailchimp.list_id'), ['email' => $request->input('newsletterEmail')]);

			// Successfull Response
			$output['status']   = 200;
			$output['response'] = ['message' => 'Newsletter sign up was successfull'];
		} catch (\Mailchimp_List_AlreadySubscribed $e) {
			// Some other error
			$output['status']   = 400;
			$output['response'] = ['message' => $e->getMessage()];
		} catch (\Mailchimp_Error $e) {
			// Some other error
			$output['status']   = 400;
			$output['response'] = ['message' => $e->getMessage()];
		}

		return response()->json($output['response'], $output['status']);
	}
}
