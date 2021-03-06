<?php namespace App\Repositories;

use App\Models\State;
use Cache;
use Config;
use Exception;
use Log;

class StateRepositoryEloquent implements StateRepository {
	/**
	 * Eloquent model object.
	 *
	 * @var State
	 */
	protected $model;

	/**
	 * Setup instance.
	 *
	 * @param State $model
	 * @param Status $status
	 */
	public function __construct(State $model) {
		$this->model = $model;
	}

	/**
	 * Build select list using given key and value field names.
	 *
	 * @param  string $key
	 * @param  string $val
	 * @param  string $order_by
	 * @return array|NULL
	 */
	public function selectList($key, $val, $order_by = NULL) {
		try {
			$order_by = (is_null($order_by)) ? $val : $order_by;
			$res = Cache::remember('states.selectList.' . $key . '.' . $val, Config::get('cache.duration.hour'), function() use($order_by) {
				return $this->model->orderBy($order_by)->get();
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
}
