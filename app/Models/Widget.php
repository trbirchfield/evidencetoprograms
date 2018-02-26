<?php namespace App\Models;

use Cache;
use Config;
use DB;
use Exception;
use Log;

class Widget extends BaseModel {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'widgets';

	/**
	 * Protect fields from mass assignment.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

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
			$widget = $this->findOrFail($id);
			$widget->status = ($widget->status == Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;
			$widget->save();

			// Clear cache
			Cache::forget('widgets');

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
			return Cache::remember('widgets.getStatuses', Config::get('cache.duration.year'), function() {
				$list = [];
				$res  = Status::orderBy('id')->get();
				foreach ($res as $row) {
					$list[] = $row->toArray();
				}

				return $list;
			});
		} catch (Exception $e) {
			log::error($e);

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
			return Cache::remember('widgets.getList', Config::get('cache.duration.hour'), function() {
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
			log::error($e);

			return NULL;
		}
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
				'widgets.id',
				'widgets.title AS title',
				'statuses.id AS status'
			)->leftJoin('statuses', 'statuses.id', '=', 'widgets.status');
			if (isset($input['filter_status'])) {
				$query->where('widgets.status', $input['filter_status']);
			}
			if (isset($input['filter_keyword'])) {
				$query->where(function($q) use($input) {
					$q->orWhere('widgets.title', 'like', '%' . $input['filter_keyword'] . '%');
				});
			}
			if (isset($input['order_by'])) {
				$query->orderBy($input['order_by'], (($input['order_dir'] == 'desc') ? 'desc' : 'asc'));
			} else {
				$query->orderBy('title', 'asc');
			}
			$res = $query->get();

			// Filtered total
			$filtered_total = $res->count();

			// Load all into array, then apply offset/limit
			$list = [];
			foreach ($res as $row) {
				$list[] = $row->toArray();
			}
			if (isset($input['offset']) and isset($input['limit'])) {
				$list = array_slice($list, $input['offset'], $input['limit']);
			}
		} catch (Exception $e) {
			log::error($e);
		}

		// Return
		return [
			'total'    => (string)$this->count(),
			'filtered' => (string)$filtered_total,
			'data'     => array_values($list)
		];
	}
}
