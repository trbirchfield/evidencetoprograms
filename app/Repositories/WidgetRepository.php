<?php namespace App\Repositories;

use App\Contracts\Repository;

interface WidgetRepository extends Repository {
	/**
	 * Return list of statuses.
	 *
	 * @return array
	 */
	public function statusList();
}
