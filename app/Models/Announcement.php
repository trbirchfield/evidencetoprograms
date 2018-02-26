<?php namespace App\Models;

use Cache;
use Config;
use Carbon\Carbon;
use DB;
use Exception;
use Log;

class Announcement extends BaseModel {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'announcements';

	/**
	 * Protect fields from mass assignment.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * The database table uses timestamp values.
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * Attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id'     => 'int',
		'status' => 'int'
	];

	/**
	 * Toggle status.
	 *
	 * @param int $id
	 * @return bool
	 */
	public function toggleStatus($id) {
		try {
			// Update status
			$announcement = $this->findOrFail($id);
			$announcement->status = ($announcement->status == Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;
			$announcement->save();

			// Clear cache
			Cache::forget('announcements.getHomepageAnnouncements');

			return TRUE;
		} catch (Exception $e) {
			Log::error($e);

			return FALSE;
		}
	}

	/**
	 * Return a list of statuses.
	 *
	 * @return array|NULL
	 */
	public function getStatuses() {
		try {
			return Cache::remember('announcements.getStatuses', Config::get('cache.duration.year'), function() {
				$list = [];
				$res  = Status::orderBy('id')->get();
				foreach ($res as $row) {
					$list[] = $row->toArray();
				}

				return $list;
			});
		} catch (Exception $e) {
			Log::error($e);

			return NULL;
		}
	}

	/**
	 * Return a list of records.
	 *
	 * @return array|NULL
	 */
	public function getList() {
		try {
			return Cache::remember('announcements.getList', Config::get('cache.duration.hour'), function() {
				$list = [];
				$res  = $this->orderBy('title', 'asc')->get();
				foreach ($res as $row) {
					$list[] = [
						'id'    => $row->id,
						'title' => $row->title
					];
				}

				return $list;
			});
		} catch (Exception $e) {
			Log::error($e);

			return NULL;
		}
	}

	/**
	 * Return a list of records.
	 *
	 * @return array|NULL
	 */
	public function getHomepageAnnouncements() {
		try {
			return Cache::remember('announcements.getHomepageAnnouncements', Config::get('cache.duration.hour'), function() {
				$list = [];
				$res  = $this->where('status', Status::ACTIVE)->orderBy('created_at', 'desc')->get();
				foreach ($res as $row) {
					$list[] = [
						'id'           => $row->id,
						'title'        => $row->title,
						'image'        => $row->image,
						'announcement' => $row->announcement,
					];
				}

				return $list;
			});
		} catch (Exception $e) {
			Log::error($e);

			return NULL;
		}
	}

	/**
	 * Is there a recent homepage announcement?
	 *
	 * @return BOOL
	 */
	public function newHomepageAnnouncements() {
		// Setup Result
		$result = FALSE;

		try {
			$list = [];
			$count  = $this->where('status', Status::ACTIVE)->where('created_at', '>=', Carbon::now()->subDays(30))->count();
			if ($count > 0) {
				$result = TRUE;
			}
		} catch (Exception $e) {
			Log::error($e);
		}

		return $result;
	}

	/**
	 * Return a filtered list of records.
	 *
	 * @param array $input
	 * @return array
	 */
	public function getFilteredList($input = []) {
		try {
			// Init values
			$list           = [];
			$filtered_total = 0;

			// Build query
			$query = $this->select(
				'announcements.id',
				'announcements.title AS title',
				'announcements.created_at',
				'statuses.id AS status'
			)->leftJoin('statuses', 'statuses.id', '=', 'announcements.status');
			if (isset($input['filter_status'])) {
				$query->where('announcements.status', $input['filter_status']);
			}
			if (isset($input['filter_keyword'])) {
				$query->where(function($q) use($input) {
					$q->orWhere('announcements.title', 'like', '%' . $input['filter_keyword'] . '%');
				});
			}
			if (isset($input['order_by'])) {
				$query->orderBy($input['order_by'], (($input['order_dir'] == 'desc') ? 'desc' : 'asc'));
			} else {
				$query->orderBy('created_at', 'desc');
			}
			$res = $query->get();

			// Filtered total
			$filtered_total = $res->count();

			// Load all into array, then apply offset/limit
			$list = [];
			foreach ($res as $row) {
				// Format Created At timestamo
				$created_at = $row->created_at->format('m/d/Y');

				// Update Timestamp with new format
				$row_array               = $row->toArray();
				$row_array['created_at'] = $created_at;

				// Add row to list
				$list[] = $row_array;

			}
			if (isset($input['offset']) and isset($input['limit'])) {
				$list = array_slice($list, $input['offset'], $input['limit']);
			}
		} catch (Exception $e) {
			Log::error($e);
		}

		// Return
		return [
			'total'    => (string)$this->count(),
			'filtered' => (string)$filtered_total,
			'data'     => array_values($list)
		];
	}
}
