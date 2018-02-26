<?php namespace App\Repositories;

use App\Contracts\Repository;

interface FAQCategoryRepository extends Repository {
	/**
	 * Return list of statuses.
	 *
	 * @return array
	 */
	public function statusList();
}
