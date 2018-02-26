<?php namespace App\Http\Api\Controllers;

use App\Models\Widget;
use Illuminate\Http\Request;

class WidgetsController extends BaseController {
	/**
	 * Setup instance.
	 *
	 * @param  Widget $model
	 * @param  Request $request
	 * @return void
	 */
	public function __construct(Widget $model, Request $request) {
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
}
