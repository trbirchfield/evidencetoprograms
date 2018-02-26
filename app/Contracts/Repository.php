<?php namespace App\Contracts;

interface Repository {
	/**
	 * Return all records.
	 *
	 * @param array $columns
	 * @return array|NULL
	 */
	public function all($columns = ['*']);

	/**
	 * Find record by id.
	 *
	 * @param int $id
	 * @param array $columns
	 * @return array|NULL
	 */
	public function find($id, $columns = ['*']);

	/**
	 * Find record by some field.
	 *
	 * @param string $key
	 * @param string $val
	 * @param array $columns
	 * @return array|NULL
	 */
	public function findBy($key, $val, $columns = ['*']);

	/**
	 * Save values.
	 *
	 * @param array $input
	 * @return array
	 */
	public function save($input = []);

	/**
	 * Delete record by id.
	 *
	 * @param int $id
	 * @param bool $force
	 * @return bool
	 */
	public function delete($id, $force = FALSE);

	/**
	 * Build select list using given key and value field names.
	 *
	 * @param  string $key
	 * @param  string $val
	 * @return array|NULL
	 */
	public function selectList($key, $val);

	/**
	 * Return filtered records.
	 *
	 * @param array $input
	 * @return array|NULL
	 */
	public function filteredList($input = []);

	/**
	 * Build select list using given key and value field names.
	 *
	 * @param  string $key
	 * @param  string $val
	 * @param  int    $id
	 * @return array
	 */
	public function setValue($key, $val, $id);
}
