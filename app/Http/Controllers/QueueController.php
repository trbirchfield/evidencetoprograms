<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Queue;

class QueueController extends Controller {
	/**
	 * Handle push queue requests.
	 *
	 * @return Response
	 */
	public function postReceive() {
		return Queue::marshal();
	}
}
