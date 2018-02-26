<?php namespace App\Http\Api\Controllers;

use App\Models\FeaturedProgram;
use Illuminate\Http\Request;

class FeaturedProgramsController extends BaseController {
	/**
	 * Setup instance.
	 *
	 * @param  FeaturedProgram $model
	 * @param  Request $request
	 * @return void
	 */
	public function __construct(FeaturedProgram $model, Request $request) {
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
	 * Return a list of Featured Programs.
	 *
	 * @return Response
	 */
	public function getPrograms() {
		$list = $this->model->getListForClient();

		return response()->json($list, (is_null($list)) ? 422 : 200);
	}

	/**
	 * Return a list of Featured Programs for Sorting.
	 *
	 * @return Response
	 */
	public function getProgramsForSorting() {
		$list = $this->model->getListForSorting();

		return response()->json($list, (is_null($list)) ? 422 : 200);
	}

	/**
	 * Save Sorting Order.
	 *
	 * @return Response
	 */
	public function postSaveOrder() {
		$result = $this->model->saveSortingOrder($this->request->all());

		return response()->json($result, ($result) ? 200 : 422);
	}

	/**
	 * Post Comment for a featured program.
	 *
	 * @return Response
	 */
	public function postComment() {
		$program = $this->model->find($this->request->get('program_id'));
		$result  = $program->createComment($this->request->all());

		return response()->json($result, (is_null($result)) ? 422 : 200);
	}
}
