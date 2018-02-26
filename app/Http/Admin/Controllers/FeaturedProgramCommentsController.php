<?php namespace App\Http\Admin\Controllers;

use App\Http\Admin\Requests\FeaturedProgramCommentsRequest;
use App\Models\FeaturedProgramComment;
use App\Models\Status;
use Cache;
use Exception;
use Illuminate\Http\Request;
use Log;

class FeaturedProgramCommentsController extends BaseController {
	/**
	 * Default method.
	 *
	 * @return View
	 */
	public function getIndex() {
		$breadcrumbs = [
			['url' => route('admin.featuredprogramcomments'), 'name' => 'FeaturedProgramComments']
		];
		$bootstrap = json_encode([
			'route'  => '/api/featuredprogramcomments/filtered-list',
			'fields' => [
				['column' => 'program',    'display_name' => 'Program'],
				['column' => 'fname',      'display_name' => 'Name'],
				['column' => 'comment',    'display_name' => 'Comment'],
				['column' => 'created_at', 'display_name' => 'Date'],
				['column' => 'status',     'display_name' => 'Status']
			],
			'orderBy'  => 'created_at',
			'orderDir' => 'desc'
		]);
		$controls = [];
		$edit     = TRUE;
		$view     = FALSE;
		$delete   = '/admin/featuredprogramcomments/delete';

		return view('admin::featuredprogramcomments.list', compact('breadcrumbs', 'bootstrap', 'controls', 'edit', 'view', 'delete'));
	}

	/**
	 * Add/Edit form.
	 *
	 * @param FeaturedProgramComment $model
	 * @param int $id
	 * @return Response
	 */
	public function getEdit(FeaturedProgramComment $model, $id = NULL) {
		try {
			$resource = (isset($id)) ? $model->findOrFail($id)->toArray() : NULL;
		} catch (Exception $e) {
			return redirect()->route('admin.featuredprogramcomments');
		}
		$breadcrumbs = [
			['url' => route('admin.featuredprogramcomments'),      'name' => 'FeaturedProgramComments'],
			['url' => route('admin.featuredprogramcomments.edit'), 'name' => (!empty($resource)) ? 'Edit' : 'Add']
		];

		return view('admin::featuredprogramcomments.edit', compact('breadcrumbs', 'resource'));
	}

	/**
	 * Handle form submission.
	 *
	 * @param  FeaturedProgramComment $model
	 * @param  FeaturedProgramCommentsRequest $request
	 * @return Response
	 */
	public function postEdit(FeaturedProgramComment $model, FeaturedProgramCommentsRequest $request) {
		try {
			if ($request->has('id')) {
				$model = $model->findOrFail($request->input('id'));
			}

			// Approve Comment
			$model->status  = Status::ACTIVE;
			$model->comment = $request->input('comment');

			// Save
			if (!$model->save()) {
				throw new Exception('Unable to approve comment, please try again.');
			}

			// Clear cache
			Cache::forget('featured_programs.getListForClient');

			return redirect()->route('admin.featuredprogramcomments')->with('message', 'Comment has been approved.');
		} catch (Exception $e) {
			return redirect()->back()->withInput()->with('error', $e->getMessage());
		}
	}

	/**
	 * Handle delete request.
	 *
	 * @param  FeaturedProgramComment $model
	 * @param  Request $request
	 * @return Response
	 */
	public function postDelete(FeaturedProgramComment $model, Request $request) {
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
}
