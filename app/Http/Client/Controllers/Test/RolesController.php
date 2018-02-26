<?php namespace App\Http\Client\Controllers\Test;

use App\Models\User;

class RolesController extends BaseController {
	public function getIndex() {

		$user = User::findOrFail(3);

		if ($user->is('candidate')) {
			dd('candidate');
		} else {
			dd('voter');
		}
	}
}
