<?php namespace App\Http\Admin\Controllers;

use App\Http\Admin\Requests\FAQsRequest;
use App\Models\FAQ;
use Cache;
use Exception;
use Illuminate\Http\Request;
use Log;

class FAQsController extends BaseController {
	/**
	 * Default method.
	 *
	 * @return View
	 */
	public function getIndex() {
		$breadcrumbs = [
			['url' => route('admin.faqs'), 'name' => 'FAQs']
		];
		$bootstrap = json_encode([
			'route'  => '/api/faqs/filtered-list',
			'fields' => [
				['column' => 'question',     'display_name' => 'Question'],
				['column' => 'faq_category', 'display_name' => 'Category'],
				['column' => 'status',       'display_name' => 'Status']
			],
			'orderBy'  => 'question',
			'orderDir' => 'asc'
		]);
		$controls = [
			['action' => 'edit', 'label' => 'Add FAQ', 'icon' => 'plus-circle']
		];
		$edit   = TRUE;
		$view   = FALSE;
		$delete = '/admin/faqs/delete';

		return view('admin::faqs.list', compact('breadcrumbs', 'bootstrap', 'controls', 'edit', 'view', 'delete'));
	}

	/**
	 * Add/Edit form.
	 *
	 * @param FAQ $model
	 * @param int $id
	 * @return Response
	 */
	public function getEdit(FAQ $model, $id = NULL) {
		try {
			$resource = (isset($id)) ? $model->findOrFail($id)->toArray() : NULL;
		} catch (Exception $e) {
			return redirect()->route('admin.faqs');
		}
		$breadcrumbs = [
			['url' => route('admin.faqs'),      'name' => 'FAQs'],
			['url' => route('admin.faqs.edit'), 'name' => (!empty($resource)) ? 'Edit' : 'Add']
		];

		return view('admin::faqs.edit', compact('breadcrumbs', 'resource'));
	}

	/**
	 * Handle form submission.
	 *
	 * @param  FAQ $model
	 * @param  FAQsRequest $request
	 * @return Response
	 */
	public function postEdit(FAQ $model, FAQsRequest $request) {
		try {
			if ($request->has('id')) {
				$model = $model->findOrFail($request->input('id'));
			}

			if (!$model->fill($request->all())->save()) {
				throw new Exception('Unable to save FAQ, please try again.');
			}

			// Clear cache
			Cache::forget('faq_categories.getListForClient');

			return redirect()->route('admin.faqs')->with('message', 'FAQ has been ' . (($request->has('id')) ? 'saved' : 'added') . '.');
		} catch (Exception $e) {
			return redirect()->back()->withInput()->with('error', $e->getMessage());
		}
	}

	/**
	 * Handle delete request.
	 *
	 * @param  FAQ $model
	 * @param  Request $request
	 * @return Response
	 */
	public function postDelete(FAQ $model, Request $request) {
		try {
			$model->where('id', $request->input('id'))->delete();
			$res = [];

			// Clear cache
			Cache::forget('faq_categories.getListForClient');
		} catch (Exception $e) {
			Log::error($e);
			$res = ['error' => $e->getMessage()];
		}

		return response()->json($res, (isset($res['error'])) ? 422 : 200);
	}
}
