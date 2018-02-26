<?php namespace App\Repositories;

interface PlankRepository {
	/**
	 * Get all planks for specified user for editing.
	 *
	 * @param int $id
	 * @return array|NULL
	 */
	public function myPlanks($id);

	/**
	 * Get top planks for a given election.
	 *
	 * @param int $id
	 * @return array|NULL
	 */
	public function topPlanks($id);

	/**
	 * Update display order.
	 *
	 * @param int $user_id
	 * @param array $ids
	 * @return void
	 */
	public function updateDisplayOrder($user_id, $ids);

	/**
	 * Add new plank.
	 *
	 * @param array $input
	 * @return array
	 */
	public function add($input);

	/**
	 * Delete plank.
	 *
	 * @param int $user_id
	 * @param array $id
	 * @return array
	 */
	public function delete($user_id, $id);
}
