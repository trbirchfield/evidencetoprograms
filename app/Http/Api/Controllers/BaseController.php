<?php namespace App\Http\Api\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Exception;
use Log;
use Validator;

abstract class BaseController extends Controller {
	/**
	 * Traits
	 */
	use DispatchesCommands, ValidatesRequests;

	/**
	 * Model object.
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	/**
	 * Request object.
	 *
	 * @var Request
	 */
	protected $request;

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules;

	/**
	 * Return a list of records.
	 *
	 * @return Response
	 */
	public function getList() {
		$list = $this->model->getList($this->request->all());

		return response()->json($list, (is_null($list)) ? 422 : 200);
	}

	/**
	 * Return a filtered list of records.
	 *
	 * @return Response
	 */
	public function getFilteredList() {
		$list = $this->model->getFilteredList($this->request->all());

		return response()->json($list, (is_null($list)) ? 422 : 200);
	}

	/**
	 * Handle status toggle.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function postStatus($id) {
		try {
			if (!$this->model->toggleStatus($id)) {
				throw new Exception('Unable to update status, please try again.');
			}
			$res = [];
		} catch (Exception $e) {
			Log::error($e);
			$res = ['error' => $e->getMessage()];
		}

		return response()->json($res, (isset($res['error'])) ? 422 : 200);
	}
}
