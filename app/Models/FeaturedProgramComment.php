<?php namespace App\Models;

use Cache;
use Config;
use Carbon\Carbon;
use DB;
use Exception;
use Log;

class FeaturedProgramComment extends BaseModel {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'featured_program_comments';

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
	public function program() {
		return $this->belongsTo('App\Models\FeaturedProgram');
	}

	/**
	 * Attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id'                  => 'int',
		'featured_program_id' => 'int',
		'status'              => 'int'
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
			Cache::forget('featured_programs.getListForClient');

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
			return Cache::remember('featured_program_comments.getStatuses', Config::get('cache.duration.year'), function() {
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
			return Cache::remember('featured_program_comments.getList', Config::get('cache.duration.hour'), function() {
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
				'featured_program_comments.id',
				'featured_program_comments.fname',
				'featured_program_comments.comment',
				'featured_program_comments.created_at',
				'featured_programs.title AS program',
				'statuses.id AS status'
			)->leftJoin('statuses', 'statuses.id', '=', 'featured_program_comments.status')->leftJoin('featured_programs', 'featured_programs.id', '=', 'featured_program_comments.featured_program_id');
			if (isset($input['filter_status'])) {
				$query->where('featured_program_comments.status', $input['filter_status']);
			}
			if (isset($input['filter_keyword'])) {
				$query->where(function($q) use($input) {
					$q->orWhere('featured_program_comments.comment', 'like', '%' . $input['filter_keyword'] . '%');
				});
			}
			if (isset($input['order_by'])) {
				$query->orderBy($input['order_by'], (($input['order_dir'] == 'desc') ? 'desc' : 'asc'));
			} else {
				$query->orderBy('created_at', 'asc');
			}
			$res = $query->get();

			// Filtered total
			$filtered_total = $res->count();

			// Load all into array, then apply offset/limit
			$list = [];
			foreach ($res as $row) {
				// Add row to list
				$list[] = [
					'id'         => $row->id,
					'program'    => $row->program,
					'fname'      => $row->fname,
					'comment'    => str_limit($row->comment, $limit = 100, $end = '...'),
					'created_at' => $row->created_at->toDayDateTimeString(),
					'status'     => $row->status
				];

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
