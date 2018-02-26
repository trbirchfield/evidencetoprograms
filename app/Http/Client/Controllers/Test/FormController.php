<?php namespace App\Http\Client\Controllers\Test;

use App\Http\Client\Requests\Test\FormRequest;
use Mail;
use Validator;

class FormController extends BaseController {
	/**
	 * Form fields.
	 *
	 * @return Response
	 */
	public function getIndex() {

		$input = [
			'password' => 'pass.2009',
			'phone'    => '(555) 555-5555'
		];
		$v = Validator::make($input, [
			'password' => 'password',
			'phone'    => 'phone'
		]);
		if ($v->fails()) {
			dd('failed');
		}
		dd($input);





		$page_title = 'Basic Form';

		return view('client::test.form', compact('page_title'));
	}

	/**
	 * Handle form post.
	 *
	 * @param  FormRequest $request
	 * @return Response
	 */
	public function postIndex(FormRequest $request) {
		// Set input
		$input = $request->all();

		// Auto reply
		Mail::queue('client::emails.auto_reply', ['name' => $input['name']], function($m) use($input) {
			$m->to($input['email']);
			$m->from(config('site.client.emails.info'), config('site.client.company_name'));
			$m->subject('Thank you for contacting ' . config('site.client.company_name'));
		});

		// Email client
		$msg = '
			Name: ' . $input['name'] . '<br>
			Email: ' . $input['email'] . '<br>
			Message: ' . $input['message'] . '
		';
		Mail::queue('client::emails.generic', compact('msg'), function($m) use($input) {
			$m->to(config('site.client.emails.info'));
			$m->from($input['email']);
			$m->sender(config('site.client.emails.info'), config('site.client.company_name'));
			$m->subject('Test Form: ' . $input['name']);
		});

		// Reload form with success message
		return redirect()->back()->with('message', '--- success message ---');
	}
}
