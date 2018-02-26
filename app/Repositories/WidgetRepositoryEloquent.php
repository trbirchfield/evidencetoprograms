<?php namespace App\Repositories;

use App\Models\Widget;
use App\Models\Status;
use Cache;
use Config;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Log;

class WidgetRepositoryEloquent implements WidgetRepository {
	/**
	 * Eloquent model object.
	 *
	 * @var Widget
	 */
	protected $model;

	/**
	 * Eloquent model object.
	 *
	 * @var Status
	 */
	protected $status;

	/**
	 * Setup instance.
	 *
	 * @param Widget $model
	 * @param Status $status
	 */
	public function __construct(Widget $model, Status $status) {
		$this->model  = $model;
		$this->status = $status;
	}

	/**
	 * Return all records.
	 *
	 * @param array $columns
	 * @return array|NULL
	 */
	public function all($columns = ['*']) {
		try {
			$res = Cache::remember('widgets.all', Config::get('cache.duration.hour'), function() use($columns) {
				return $this->model->get($columns);
			});
			$list = [];
			foreach ($res as $row) {
				$list[] = $row->toArray();
			}

			return $list;
		} catch (Exception $e) {
			log::error($e);
		}

		return NULL;
	}

	/**
	 * Find record by id.
	 *
	 * @param int $id
	 * @param array $columns
	 * @return array|NULL
	 */
	public function find($id, $columns = ['*']) {
		try {
			return Cache::remember('widgets.find.' . $id, Config::get('cache.duration.hour'), function() use($id, $columns) {
				return $this->model->findOrFail($id, $columns)->toArray();
			});
		} catch (ModelNotFoundException $e) {
			return NULL;
		} catch (Exception $e) {
			log::error($e);
		}

		return NULL;
	}

	/**
	 * Find record by a specific field value.
	 *
	 * @param string $key
	 * @param string $val
	 * @param array $columns
	 * @return array|NULL
	 */
	public function findBy($key, $val, $columns = ['*']) {
		try {
			return Cache::remember('widgets.findBy.' . $key . '.' . str_slug($val), Config::get('cache.duration.hour'), function() use($key, $val, $columns) {
				return $this->model->where($key, $val)->firstOrFail($columns)->toArray();
			});
		} catch (ModelNotFoundException $e) {
			return NULL;
		} catch (Exception $e) {
			log::error($e);
		}

		return NULL;
	}

	/**
	 * Save values.
	 *
	 * @param array $input
	 * @return array
	 */
	public function save($input = []) {
		try {
			// Init response
			$response = ['success' => FALSE];

			// Set values and save
			if (!empty($input['id'])) {
				$this->model = $this->model->findOrFail($input['id']);
			}
			if (!$this->model->fill($input)->save()) {
				throw new Exception('Unable to save Widget, please try again.');
			}

			// Clear cache
			Cache::forget('widgets');

			// Success
			$response['success'] = TRUE;
			$response['message'] = 'Widget has been saved.';
		} catch (ModelNotFoundException $e) {
			$response['error'] = 'Record not found.';
		} catch (Exception $e) {
			log::error($e);
			$response['error'] = $e->getMessage();
		}

		return $response;
	}

	/**
	 * Delete record by id.
	 *
	 * @param int $id
	 * @param bool $force
	 * @return bool
	 */
	public function delete($id, $force = FALSE) {
		try {
			// Find record to delete
			$this->model = $this->model->findOrFail($id);
			if ($force) {
				$this->model->forceDelete();
			} elseif (!$this->model->delete()) {
				throw new Exception('Error deleting Widget: ' . $id);
			}

			// Clear cache
			Cache::forget('widgets');

			// Response
			return TRUE;
		} catch (ModelNotFoundException $e) {
			return FALSE;
		} catch (Exception $e) {
			log::error($e);
		}

		return FALSE;
	}

	/**
	 * Build select list using given key and value field names.
	 *
	 * @param  string $key
	 * @param  string $val
	 * @return array|NULL
	 */
	public function selectList($key, $val) {
		try {
			$res = Cache::remember('widgets.selectList.' . $key . '.' . $val, Config::get('cache.duration.hour'), function() use($val) {
				return $this->model->orderBy($val)->get();
			});
			$list = [];
			foreach ($res as $row) {
				$list[$row->{$key}] = $row->{$val};
			}

			return $list;
		} catch (Exception $e) {
			log::error($e);
		}

		return NULL;
	}

	/**
	 * Return filtered records.
	 *
	 * @param array $input
	 * @return array
	 */
	public function filteredList($input = []) {
		try {
			// Init values
			$list           = [];
			$filtered_total = 0;

			// Build query
			$query = $this->model
				->select('widgets.id', 'widgets.title AS title', 'statuses.status AS status')
				->leftJoin('statuses', 'statuses.id', '=', 'widgets.status');
			if (isset($input['filter_status'])) {
				$query->where('widgets.status', $input['filter_status']);
			}
			if (isset($input['order_by'])) {
				$query->orderBy($input['order_by'], (($input['order_dir'] == 'desc') ? 'desc' : 'asc'));
			} else {
				$query->orderBy('title', 'asc');
			}
			// NOTE: Unsure how to handle FOUND_ROWS without raw sql. http://laravel.com/docs/5.0/pagination
			//       Handle the offset manually for now.
			// if (isset($input['offset']) and isset($input['limit'])) {
			// 	$query->skip($input['offset'])->take($input['limit']);
			// }
			$res = $query->get();

			// Filtered total
			$filtered_total = $res->count();

			// Load all into array, the apply offset/limit
			$list = [];
			foreach ($res as $row) {
				$list[] = $row->toArray();
			}
			if (isset($input['offset']) and isset($input['limit'])) {
				$list = array_slice($list, $input['offset'], $input['limit']);
			}

			// Prepare results if needed
			// foreach ($list as $k => $row) {

			// }
		} catch (Exception $e) {
			log::error($e);
		}

		// Return
		return [
			'total'    => (string)$this->model->count(),
			'filtered' => (string)$filtered_total,
			'data'     => array_values($list)
		];
	}

	/**
	 * Set the value for the specified field.
	 *
	 * @param  string $key
	 * @param  string $val
	 * @param  int    $id
	 * @return array
	 */
	public function setValue($key, $val, $id) {
		try {
			// Init response
			$response = ['success' => FALSE];

			// Set value and save
			$this->model = $this->model->findOrFail($id);
			$this->model->{$key} = $val;
			if (!$this->model->save()) {
				throw new Exception('Unable to update Widget, please try again.');
			}

			// Clear cache
			Cache::forget('widgets');

			// Success
			$response['success'] = TRUE;
			$response['message'] = 'Widget has been updated.';
		} catch (ModelNotFoundException $e) {
			$response['error'] = 'Record not found.';
		} catch (Exception $e) {
			log::error($e);
			$response['error'] = $e->getMessage();
		}

		return $response;
	}

	/**
	 * Return list of statuses.
	 *
	 * @return array
	 */
	public function statusList() {
		try {
			$status = $this->status;
			$res    = Cache::remember('widgets.statusList', Config::get('cache.duration.hour'), function() use($status) {
				return $this->status->whereIn('id', [$status::ACTIVE, $status::INACTIVE])->orderBy('status')->get();
			});
			$list = [];
			foreach ($res as $row) {
				$list[$row->id] = $row->status;
			}

			return $list;
		} catch (Exception $e) {
			log::error($e);
		}

		return [];
	}
}
