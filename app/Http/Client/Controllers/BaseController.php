<?php namespace App\Http\Client\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class BaseController extends Controller {
	/**
	 * Traits
	 */
	use DispatchesCommands, ValidatesRequests;
}
