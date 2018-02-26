<?php namespace App\Models;

use Cache;
use Config;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Log;

class BaseModel extends Model {
	/**
	 * Timestamps not used as default.
	 *
	 * @var boolean
	 */
	public $timestamps = FALSE;

	/**
	 * Attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = ['id' => 'int'];

	/**
	 * Allow custom field formatting and logic when saving.
	 *
	 * @param  array $input
	 * @return Model
	 */
	public function fill(array $input) {
		// Clear some default fields not meant to be saved
		unset(
			$input['this_form_name'],
			$input['this_form_id'],
			$input['email_trap_123'],
			$input['_token']
		);

		return parent::fill($input);
	}
}
