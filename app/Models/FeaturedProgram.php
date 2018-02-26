<?php namespace App\Models;

use Cache;
use Config;
use Carbon\Carbon;
use DB;
use Exception;
use Log;

class FeaturedProgram extends BaseModel {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'featured_programs';

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
	 * Comments
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function comments() {
		return $this->hasMany('App\Models\FeaturedProgramComment', 'featured_program_id');
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
			$featured_program         = $this->findOrFail($id);
			$featured_program->status = ($featured_program->status == Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;
			$featured_program->save();

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
			return Cache::remember('featured_programs.getStatuses', Config::get('cache.duration.year'), function() {
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
			return Cache::remember('featured_programs.getList', Config::get('cache.duration.hour'), function() {
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
				'featured_programs.id',
				'featured_programs.title AS title',
				'statuses.id AS status'
			)->leftJoin('statuses', 'statuses.id', '=', 'featured_programs.status');
			if (isset($input['filter_status'])) {
				$query->where('featured_programs.status', $input['filter_status']);
			}
			if (isset($input['filter_keyword'])) {
				$query->where(function($q) use($input) {
					$q->orWhere('featured_programs.title', 'like', '%' . $input['filter_keyword'] . '%');
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
	 * Return a list of Programs with nested comments.
	 *
	 * @return array|NULL
	 */
	public function getListForClient() {
		try {
			return Cache::remember('featured_programs.getListForClient', Config::get('cache.duration.hour'), function() {
				$list = [];
				$res  = $this->where('status', Status::ACTIVE)->orderBy('display_order', 'asc')->get();
				foreach ($res as $featured_programs) {
					// Create FAQ List from Category
					$comments = [];
					foreach ($featured_programs->comments()->where('status', Status::ACTIVE)->orderBy('created_at', 'asc')->get() as $comment) {
						$comments[] = [
							'id'        => $comment->id,
							'date'      => $comment->created_at->toDayDateTimeString(),
							'content'   => $comment->comment,
							'posted_by' => $comment->fname
						];
					}

					// Create Category List With Nested FAQs
					$list[] = [
						'id'          => $featured_programs->id,
						'title'       => $featured_programs->title,
						'image'       => '/' . Config::get('site.uploads.content') . '/' .$featured_programs->image,
						'video_id'    => $featured_programs->youtube_id,
						'description' => $featured_programs->summary,
						'responses'   => $comments
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
	 * Return a list of programs for sorting.
	 *
	 * @return array|NULL
	 */
	public function getListForSorting() {
		try {
			$list = [];
			$res  = $this->where('status', Status::ACTIVE)->orderBy('display_order', 'asc')->get();
			foreach ($res as $featured_program) {
				// Create Program List
				$list[] = [
					'id'       => $featured_program->id,
					'name'     => $featured_program->title,
					'sortable' => TRUE,
					'level'    => NULL
				];
			}

			return $list;
		} catch (Exception $e) {
			Log::error($e);

			return NULL;
		}
	}

	/**
	 * Save Display Order.
	 *
	 * @param array $input
	 * @return bool
	 */
	public function saveSortingOrder($input = NULL) {
		try {
			// Start DB Transaction
			DB::transaction(function() use($input) {
				foreach ($input as $display_order => $program) {
					// Find Program and update display order
					$category                = $this->findOrFail($program['id']);
					$category->display_order = $display_order;
					$category->save();
				}
			});

			// Clear cache
			Cache::forget('featured_programs.getListForClient');

			return TRUE;
		} catch (Exception $e) {
			Log::error($e);

			return FALSE;
		}
	}

	/**
	 * Create Posted Comment.
	 *
	 * @param array $input
	 * @return bool
	 */
	public function createComment($input = NULL) {
		try {
			$comment = $this->comments()->create([
				'fname'      => $input['name'],
				'email'      => $input['email'],
				'comment'    => $input['comment'],
				'status'     => Status::INACTIVE,
				'created_at' => Carbon::now()
			]);

			// Clear cache
			Cache::forget('featured_program_comments');

			return TRUE;
		} catch (Exception $e) {
			Log::error($e);

			return FALSE;
		}
	}
}
