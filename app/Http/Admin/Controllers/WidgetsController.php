<?php namespace App\Http\Admin\Controllers;

use App\Http\Admin\Requests\WidgetsRequest;
use App\Models\Widget;
use Exception;
use Illuminate\Http\Request;
use Log;

class WidgetsController extends BaseController {
	/**
	 * Default method.
	 *
	 * @return View
	 */
	public function getIndex() {
		$breadcrumbs = [
			['url' => route('admin.widgets'), 'name' => 'Widgets']
		];
		$bootstrap = json_encode([
			'route'  => '/api/widgets/filtered-list',
			'fields' => [
				['column' => 'title',   'display_name' => 'Title'],
				['column' => 'status', 'display_name' => 'Status']
			],
			'orderBy'  => 'title',
			'orderDir' => 'asc'
		]);
		$controls = [
			['action' => 'edit', 'label' => 'Add Widget', 'icon' => 'plus-circle']
		];
		$edit   = TRUE;
		$view   = FALSE;
		$delete = '/admin/widgets/delete';

		return view('admin::widgets.list', compact('breadcrumbs', 'bootstrap', 'controls', 'edit', 'view', 'delete'));
	}

	/**
	 * Add/Edit form.
	 *
	 * @param Widget $model
	 * @param int $id
	 * @return Response
	 */
	public function getEdit(Widget $model, $id = NULL) {
		try {
			$resource = (isset($id)) ? $model->findOrFail($id)->toArray() : NULL;
		} catch (Exception $e) {
			return redirect()->route('admin.widgets');
		}
		$breadcrumbs = [
			['url' => route('admin.widgets'),      'name' => 'Widgets'],
			['url' => route('admin.widgets.edit'), 'name' => (!empty($resource)) ? 'Edit' : 'Add']
		];

		return view('admin::widgets.edit', compact('breadcrumbs', 'resource'));
	}

	/**
	 * Handle form submission.
	 *
	 * @param  Widget $model
	 * @param  WidgetsRequest $request
	 * @return Response
	 */
	public function postEdit(Widget $model, WidgetsRequest $request) {
		try {
			if ($request->has('id')) {
				$model = $model->findOrFail($request->input('id'));
			}
			if (!$model->fill($request->all())->save()) {
				throw new Exception('Unable to save Widget, please try again.');
			}

			return redirect()->route('admin.widgets')->with('message', 'Widget has been ' . (($request->has('id')) ? 'saved' : 'added') . '.');
		} catch (Exception $e) {
			return redirect()->back()->withInput()->with('error', $e->getMessage());
		}
	}

	/**
	 * Handle delete request.
	 *
	 * @param  Widget $model
	 * @param  Request $request
	 * @return Response
	 */
	public function postDelete(Widget $model, Request $request) {
		try {
			$model->where('id', $request->input('id'))->delete();
			$res = [];
		} catch (Exception $e) {
			Log::error($e);
			$res = ['error' => $e->getMessage()];
		}

		return response()->json($res, (isset($res['error'])) ? 422 : 200);
	}
}
