<?php namespace App\Http\Admin\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class BaseController extends Controller {
	/**
	 * Traits
	 */
	use DispatchesCommands, ValidatesRequests;

	/**
	 * Repository object.
	 *
	 * @var Repository
	 */
	protected $repo;
}
