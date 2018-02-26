<?php namespace App\Models;

class Status extends BaseModel {
	/**
	 * Constants
	 */
	const ACTIVE   = 1;
	const INACTIVE = 2;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';

	/**
	 * Protect fields from mass assignment.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
}
