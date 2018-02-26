<?php namespace App\Http\Admin\Controllers;

use App\Http\Admin\Requests\FAQCategoriesRequest;
use App\Models\FAQCategory;
use Cache;
use Exception;
use Illuminate\Http\Request;
use Log;

class FAQCategoriesController extends BaseController {
	/**
	 * Default method.
	 *
	 * @return View
	 */
	public function getIndex() {
		$breadcrumbs = [
			['url' => route('admin.faqcategories'), 'name' => 'FAQCategories']
		];
		$bootstrap = json_encode([
			'route'  => '/api/faqcategories/filtered-list',
			'fields' => [
				['column' => 'title',  'display_name' => 'Title'],
				['column' => 'status', 'display_name' => 'Status']
			],
			'orderBy'  => 'title',
			'orderDir' => 'asc'
		]);
		$controls = [
			['action' => 'edit',  'label' => 'Add FAQ Category',     'icon' => 'plus-circle'],
			['action' => 'order', 'label' => 'Order FAQ Categories', 'icon' => 'reorder']
		];
		$edit   = TRUE;
		$view   = FALSE;
		$delete = '/admin/faqcategories/delete';

		return view('admin::faqcategories.list', compact('breadcrumbs', 'bootstrap', 'controls', 'edit', 'view', 'delete'));
	}

	/**
	 * Add/Edit form.
	 *
	 * @param FAQCategory $model
	 * @param int $id
	 * @return Response
	 */
	public function getEdit(FAQCategory $model, $id = NULL) {
		try {
			$resource = (isset($id)) ? $model->findOrFail($id)->toArray() : NULL;
		} catch (Exception $e) {
			return redirect()->route('admin.faqcategories');
		}
		$breadcrumbs = [
			['url' => route('admin.faqcategories'),      'name' => 'FAQCategories'],
			['url' => route('admin.faqcategories.edit'), 'name' => (!empty($resource)) ? 'Edit' : 'Add']
		];

		return view('admin::faqcategories.edit', compact('breadcrumbs', 'resource'));
	}

	/**
	 * Handle form submission.
	 *
	 * @param  FAQCategory $model
	 * @param  AnnouncementsRequest $request
	 * @return Response
	 */
	public function postEdit(FAQCategory $model, FAQCategoriesRequest $request) {
		try {
			if ($request->has('id')) {
				$model = $model->findOrFail($request->input('id'));
			}

			if (!$model->fill($request->all())->save()) {
				throw new Exception('Unable to save FAQ Category, please try again.');
			}

			// Clear cache
			Cache::forget('faq_categories.getListForClient');

			return redirect()->route('admin.faqcategories')->with('message', 'FAQ Category has been ' . (($request->has('id')) ? 'saved' : 'added') . '.');
		} catch (Exception $e) {
			return redirect()->back()->withInput()->with('error', $e->getMessage());
		}
	}

	/**
	 * Handle delete request.
	 *
	 * @param  FAQCategory $model
	 * @param  Request $request
	 * @return Response
	 */
	public function postDelete(FAQCategory $model, Request $request) {
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

	/**
	 * Handle Order Request.
	 *
	 * @return View
	 */
	public function getOrder() {
		$breadcrumbs = [
			['url' => route('admin.faqcategories'),       'name' => 'FAQCategories'],
			['url' => route('admin.faqcategories.order'), 'name' => 'Order']
		];

		return view('admin::faqcategories.order', compact('breadcrumbs'));
	}
}
