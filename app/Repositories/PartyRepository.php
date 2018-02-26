<?php namespace App\Repositories;

interface PartyRepository {
	/**
	 * Build select list using given key and value field names.
	 *
	 * @param  string $key
	 * @param  string $val
	 * @param  string $order_by
	 * @return array|NULL
	 */
	public function selectList($key, $val, $order_by);
}
