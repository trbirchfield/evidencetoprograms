<?php namespace App\Repositories;

use App\Models\Plank;
use Cache;
use Config;
use Exception;
use Log;

class PlankRepositoryEloquent implements PlankRepository {
	/**
	 * Eloquent model object.
	 *
	 * @var Plank
	 */
	protected $model;

	/**
	 * Setup instance.
	 *
	 * @param Plank $model
	 * @param Status $status
	 */
	public function __construct(Plank $model) {
		$this->model = $model;
	}

	/**
	 * Get all planks for specified user in current election.
	 *
	 * @param int $id
	 * @return array|NULL
	 */
	public function myPlanks($id) {
		try {
			$res = Cache::remember('planks.myPlanks.' . $id, Config::get('cache.duration.hour'), function() use($id) {
				return $this->model->where('user_id', $id)->orderBy('display_order')->get();
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
	 * Get top planks for a given election.
	 *
	 * @param int $id
	 * @return array|NULL
	 */
	public function topPlanks($id) {
		try {
			$res = Cache::remember('planks.topPlanks.' . $id, Config::get('cache.duration.hour'), function() use($id) {

				// TODO: what determines "top"?

				return $this->model->get();
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
	 * Update display order.
	 *
	 * @param int $user_id
	 * @param array $ids
	 * @throws Exception
	 * @return void
	 */
	public function updateDisplayOrder($user_id, $ids) {
		$display_order = array_flip($ids);
		$res           = $this->model->where('user_id', $user_id)->get();
		foreach ($res as $row) {
			$row->display_order = $display_order[$row->id] + 1;
			$row->save();
		}

		Cache::forget('planks');
	}

	/**
	 * Add new plank.
	 *
	 * @param array $input
	 * @throws Exception
	 * @return void
	 */
	public function add($input) {
		if (!$this->model->fill($input)->save()) {
			throw new Exception('Unable to save Plank, please try again.');
		}

		Cache::forget('planks');
	}

	/**
	 * Delete plank.
	 *
	 * @param int $user_id
	 * @param array $id
	 * @throws Exception
	 * @return void
	 */
	public function delete($user_id, $id) {
		$this->model = $this->model->where('user_id', $user_id)->findOrFail($id);
		if (!$this->model->delete()) {
			throw new Exception('Unable to delete Plank, please try again.');
		}

		Cache::forget('planks');
	}
}
