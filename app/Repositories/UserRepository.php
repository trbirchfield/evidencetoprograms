<?php namespace App\Repositories;

use App\Contracts\Repository;

interface UserRepository extends Repository {
	/**
	 * Return list of statuses.
	 *
	 * @return array
	 */
	public function statusList();

	/**
	 * Return list of followed candidates.
	 *
	 * @param int $id
	 * @return array
	 */
	public function followedCandidates($id);

	/**
	 * Get candidate(s) for public profile.
	 *
	 * @param string $slug
	 * @param int $id
	 * @return array|NULL
	 */
	public function getCandidates($slug, $id);
}
