<?php namespace App\Models;

use Cache;
use Config;
use Carbon\Carbon;
use DB;
use Exception;
use Log;

class FAQ extends BaseModel {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'faqs';

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
	public $timestamps = TRUE;

	/**
	 * Category
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function category() {
		return $this->belongsTo('App\Models\FAQCategory');
	}

	/**
	 * Attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id'              => 'int',
		'faq_category_id' => 'int',
		'status'          => 'int'
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
			$faq         = $this->findOrFail($id);
			$faq->status = ($faq->status == Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;
			$faq->save();

			// Clear cache
			Cache::forget('faq_categories.getListForClient');

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
			return Cache::remember('faqs.getStatuses', Config::get('cache.duration.year'), function() {
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
			return Cache::remember('faqs.getList', Config::get('cache.duration.hour'), function() {
				$list = [];
				$res  = $this->orderBy('question', 'asc')->get();
				foreach ($res as $row) {
					$list[] = [
						'id'    => $row->id,
						'title' => $row->question
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
				'faqs.id',
				'faqs.question AS question',
				'faq_categories.title AS faq_category',
				'statuses.id AS status'
			)->leftJoin('statuses', 'statuses.id', '=', 'faqs.status')
			->leftJoin('faq_categories', 'faq_categories.id', '=', 'faqs.faq_category_id');
			if (isset($input['filter_status'])) {
				$query->where('faqs.status', $input['filter_status']);
			}
			if (isset($input['filter_category_id'])) {
				$query->where('faq_categories.id', $input['filter_category_id']);
			}
			if (isset($input['filter_keyword'])) {
				$query->where(function($q) use($input) {
					$q->orWhere('faqs.question', 'like', '%' . $input['filter_keyword'] . '%');
				});
			}
			if (isset($input['order_by'])) {
				$query->orderBy($input['order_by'], (($input['order_dir'] == 'desc') ? 'desc' : 'asc'));
			} else {
				$query->orderBy('question', 'asc');
			}
			$res = $query->get();

			// Filtered total
			$filtered_total = $res->count();

			// Load all into array, then apply offset/limit
			$list = [];
			foreach ($res as $row) {
				// Add row to list
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
