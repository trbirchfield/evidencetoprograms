<?php namespace App\Http\Api\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Mail;

class FAQsController extends BaseController {
	/**
	 * Setup instance.
	 *
	 * @param  FAQ $model
	 * @param  Request $request
	 * @return void
	 */
	public function __construct(FAQ $model, Request $request) {
		$this->model   = $model;
		$this->request = $request;
	}

	/**
	 * Return a list of user statuses.
	 *
	 * @return Response
	 */
	public function getStatuses() {
		$list = $this->model->getStatuses();

		return response()->json($list, (is_null($list)) ? 422 : 200);
	}

	/**
	 * Post question from FAQ form.
	 *
	 * @return Response
	 */
	public function postAskQuestion() {
		$input = $this->request->all();
		try {
			// Email client
			Mail::send('client::emails.faq_client', compact('input'), function($m) use($input) {
				$m->to(config('site.client.emails.info'));
				$m->from('noreply@evidencetoprograms.com', config('site.client.company_name'));
				$m->sender(config('site.client.emails.info'), config('site.client.company_name'));
				$m->subject($input['name'] . ' posted a question for us.');
			});

			$res = 'success';
		} catch (Exception $e) {
			Log::error($e);
		}

		return response()->json($res, (is_null($res)) ? 422 : 200);
	}
}
