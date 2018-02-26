<?php namespace App\Http\Admin\Controllers;

use App\Http\Admin\Requests\FeaturedProgramsRequest;
use App\Models\FeaturedProgram;
use Cache;
use Exception;
use Illuminate\Http\Request;
use Log;

class FeaturedProgramsController extends BaseController {
	/**
	 * Default method.
	 *
	 * @return View
	 */
	public function getIndex() {
		$breadcrumbs = [
			['url' => route('admin.featuredprograms'), 'name' => 'FeaturedPrograms']
		];
		$bootstrap = json_encode([
			'route'  => '/api/featuredprograms/filtered-list',
			'fields' => [
				['column' => 'title',  'display_name' => 'Title'],
				['column' => 'status', 'display_name' => 'Status']
			],
			'orderBy'  => 'title',
			'orderDir' => 'asc'
		]);
		$controls = [
			['action' => 'edit',  'label' => 'Add Featured Program',    'icon' => 'plus-circle'],
			['action' => 'order', 'label' => 'Order Featured Programs', 'icon' => 'reorder']
		];
		$edit   = TRUE;
		$view   = FALSE;
		$delete = '/admin/featuredprograms/delete';

		return view('admin::featuredprograms.list', compact('breadcrumbs', 'bootstrap', 'controls', 'edit', 'view', 'delete'));
	}

	/**
	 * Add/Edit form.
	 *
	 * @param FeaturedProgram $model
	 * @param int $id
	 * @return Response
	 */
	public function getEdit(FeaturedProgram $model, $id = NULL) {
		try {
			$resource = (isset($id)) ? $model->findOrFail($id)->toArray() : NULL;
		} catch (Exception $e) {
			return redirect()->route('admin.featuredprograms');
		}
		$breadcrumbs = [
			['url' => route('admin.featuredprograms'),      'name' => 'FeaturedPrograms'],
			['url' => route('admin.featuredprograms.edit'), 'name' => (!empty($resource)) ? 'Edit' : 'Add']
		];

		return view('admin::featuredprograms.edit', compact('breadcrumbs', 'resource'));
	}

	/**
	 * Handle form submission.
	 *
	 * @param  FeaturedProgram $model
	 * @param  AnnouncementsRequest $request
	 * @return Response
	 */
	public function postEdit(FeaturedProgram $model, FeaturedProgramsRequest $request) {
		try {
			if ($request->has('id')) {
				$model = $model->findOrFail($request->input('id'));
			}

			if (!$model->fill($request->all())->save()) {
				throw new Exception('Unable to save Featured Program, please try again.');
			}

			// Clear cache
			Cache::forget('featured_programs.getListForClient');

			return redirect()->route('admin.featuredprograms')->with('message', 'Featured Program has been ' . (($request->has('id')) ? 'saved' : 'added') . '.');
		} catch (Exception $e) {
			return redirect()->back()->withInput()->with('error', $e->getMessage());
		}
	}

	/**
	 * Handle delete request.
	 *
	 * @param  FeaturedProgram $model
	 * @param  Request $request
	 * @return Response
	 */
	public function postDelete(FeaturedProgram $model, Request $request) {
		try {
			$model->where('id', $request->input('id'))->delete();
			$res = [];

			// Clear cache
			Cache::forget('featured_programs.getListForClient');
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
			['url' => route('admin.featuredprograms'),       'name' => 'FeaturedPrograms'],
			['url' => route('admin.featuredprograms.order'), 'name' => 'Order']
		];

		return view('admin::featuredprograms.order', compact('breadcrumbs'));
	}
}
