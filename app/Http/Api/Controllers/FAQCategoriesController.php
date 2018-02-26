<?php namespace App\Http\Api\Controllers;

use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQCategoriesController extends BaseController {
	/**
	 * Setup instance.
	 *
	 * @param  FAQCategory $model
	 * @param  Request $request
	 * @return void
	 */
	public function __construct(FAQCategory $model, Request $request) {
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
	 * Return a list of FAQ Categories.
	 *
	 * @return Response
	 */
	public function getCategories() {
		$list = $this->model->getListForClient();

		return response()->json($list, (is_null($list)) ? 422 : 200);
	}

	/**
	 * Return a list of FAQ Categories for Sorting.
	 *
	 * @return Response
	 */
	public function getCategoriesForSorting() {
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
}
