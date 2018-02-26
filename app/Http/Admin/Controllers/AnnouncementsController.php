<?php namespace App\Http\Admin\Controllers;

use App\Http\Admin\Requests\AnnouncementsRequest;
use App\Models\Announcement;
use Cache;
use Exception;
use Illuminate\Http\Request;
use Log;

class AnnouncementsController extends BaseController {
	/**
	 * Default method.
	 *
	 * @return View
	 */
	public function getIndex() {
		$breadcrumbs = [
			['url' => route('admin.announcements'), 'name' => 'Announcements']
		];
		$bootstrap = json_encode([
			'route'  => '/api/announcements/filtered-list',
			'fields' => [
				['column' => 'created_at', 'display_name' => 'Date Created'],
				['column' => 'title',     'display_name' => 'Title'],
				['column' => 'status',    'display_name' => 'Status']
			],
			'orderBy'  => 'created_at',
			'orderDir' => 'desc'
		]);
		$controls = [
			['action' => 'edit', 'label' => 'Add Announcement', 'icon' => 'plus-circle']
		];
		$edit   = TRUE;
		$view   = FALSE;
		$delete = '/admin/announcements/delete';

		return view('admin::announcements.list', compact('breadcrumbs', 'bootstrap', 'controls', 'edit', 'view', 'delete'));
	}

	/**
	 * Add/Edit form.
	 *
	 * @param Announcement $model
	 * @param int $id
	 * @return Response
	 */
	public function getEdit(Announcement $model, $id = NULL) {
		try {
			$resource = (isset($id)) ? $model->findOrFail($id)->toArray() : NULL;
		} catch (Exception $e) {
			return redirect()->route('admin.announcements');
		}
		$breadcrumbs = [
			['url' => route('admin.announcements'),      'name' => 'Announcements'],
			['url' => route('admin.announcements.edit'), 'name' => (!empty($resource)) ? 'Edit' : 'Add']
		];

		return view('admin::announcements.edit', compact('breadcrumbs', 'resource'));
	}

	/**
	 * Handle form submission.
	 *
	 * @param  Announcement $model
	 * @param  AnnouncementsRequest $request
	 * @return Response
	 */
	public function postEdit(Announcement $model, AnnouncementsRequest $request) {
		try {
			if ($request->has('id')) {
				$model = $model->findOrFail($request->input('id'));
			}

			if (!$model->fill($request->all())->save()) {
				throw new Exception('Unable to save Announcement, please try again.');
			}

			// Clear cache
			Cache::forget('announcements.getHomepageAnnouncements');

			return redirect()->route('admin.announcements')->with('message', 'Announcement has been ' . (($request->has('id')) ? 'saved' : 'added') . '.');
		} catch (Exception $e) {
			return redirect()->back()->withInput()->with('error', $e->getMessage());
		}
	}

	/**
	 * Handle delete request.
	 *
	 * @param  Announcement $model
	 * @param  Request $request
	 * @return Response
	 */
	public function postDelete(Announcement $model, Request $request) {
		try {
			$model->where('id', $request->input('id'))->delete();
			$res = [];

			// Clear cache
			Cache::forget('announcements.getHomepageAnnouncements');
		} catch (Exception $e) {
			Log::error($e);
			$res = ['error' => $e->getMessage()];
		}

		return response()->json($res, (isset($res['error'])) ? 422 : 200);
	}
}
