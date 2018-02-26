<?php namespace App\Models;

use Cache;
use Config;
use Carbon\Carbon;
use DB;
use Exception;
use Log;

class FAQCategory extends BaseModel {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'faq_categories';

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
	 * FAQs
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function faqs() {
		return $this->hasMany('App\Models\FAQ', 'faq_category_id');
	}

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
			$faq_category         = $this->findOrFail($id);
			$faq_category->status = ($faq_category->status == Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;
			$faq_category->save();

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
			return Cache::remember('faq_categories.getStatuses', Config::get('cache.duration.year'), function() {
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
			return Cache::remember('faq_categories.getList', Config::get('cache.duration.hour'), function() {
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
				'faq_categories.id',
				'faq_categories.title AS title',
				'statuses.id AS status'
			)->leftJoin('statuses', 'statuses.id', '=', 'faq_categories.status');
			if (isset($input['filter_status'])) {
				$query->where('faq_categories.status', $input['filter_status']);
			}
			if (isset($input['filter_keyword'])) {
				$query->where(function($q) use($input) {
					$q->orWhere('faq_categories.title', 'like', '%' . $input['filter_keyword'] . '%');
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
				// Add row to list
				$list[] = $row->toArray();

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

	/**
	 * Return a list of Categories with nested FAQs.
	 *
	 * @return array|NULL
	 */
	public function getListForClient() {
		try {
			return Cache::remember('faq_categories.getListForClient', Config::get('cache.duration.hour'), function() {
				$list = [];
				$res  = $this->where('status', Status::ACTIVE)->orderBy('display_order', 'asc')->get();
				foreach ($res as $faq_category) {
					// Create FAQ List from Category
					$faqs = [];
					foreach ($faq_category->faqs()->where('status', Status::ACTIVE)->orderBy('display_order', 'asc')->get() as $faq) {
						$faqs[] = [
							'id'            => $faq->id,
							'question'      => $faq->question,
							'answer'        => $faq->answer,
							'display_order' => $faq->display_order
						];
					}

					// Create Category List With Nested FAQs
					$list[] = [
						'id'            => $faq_category->id,
						'title'         => $faq_category->title,
						'display_order' => $faq_category->display_order,
						'questions'     => $faqs
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
	 * Return a list of Categories with nested FAQs.
	 *
	 * @return array|NULL
	 */
	public function getListForSorting() {
		try {
				$list = [];
				$res  = $this->where('status', Status::ACTIVE)->orderBy('display_order', 'asc')->get();
				foreach ($res as $faq_category) {
					// Create FAQ List from Category
					$faqs = [];
					foreach ($faq_category->faqs()->where('status', Status::ACTIVE)->orderBy('display_order', 'asc')->get() as $faq) {
						$faqs[] = [
							'id'       => $faq->id,
							'name'     => $faq->question,
							'sortable' => TRUE,
							'level'    => 0
						];
					}

					// Create Category List With Nested FAQs
					$list[] = [
						'id'            => $faq_category->id,
						'name'          => $faq_category->title,
						'sortable'      => TRUE,
						'level'         => NULL,
						'children'      => $faqs
					];
				}

				return $list;
		} catch (Exception $e) {
			Log::error($e);

			return NULL;
		}
	}

	/**
	 * Save Sorting Order.
	 *
	 * @param array $input
	 * @return bool
	 */
	public function saveSortingOrder($input = NULL) {
		try {
			// Start DB Transaction
			DB::transaction(function() use($input) {
				foreach ($input as $display_order => $faq_category) {
					// Setup FAQ Sync Array EX: ->sync([1 => ['expires' => true], 2, 3])
					$category_sync = [];
					if (!empty($faq_category['children'])) {
						foreach ($faq_category['children'] as $child_display_order => $child) {
							$faq                  = FAQ::find($child['id']);
							$faq->display_order   = $child_display_order;
							$faq->faq_category_id = $faq_category['id'];
							$faq->save();
						}
					}

					// Find Category and update display order and related FAQ's
					$category                = $this->findOrFail($faq_category['id']);
					$category->display_order = $display_order;
					$category->save();
				}
			});

			// Clear cache
			Cache::forget('faq_categories.getListForClient');

			return TRUE;
		} catch (Exception $e) {
			Log::error($e);

			return FALSE;
		}
	}
}
