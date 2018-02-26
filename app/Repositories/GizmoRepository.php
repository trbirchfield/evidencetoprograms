<?php namespace App\Repositories;

use App\Contracts\Repository;

interface GizmoRepository extends Repository {
	/**
	 * Return list of statuses.
	 *
	 * @return array
	 */
	public function statusList();
}
