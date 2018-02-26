<?php

if (!function_exists('growl')) {
	/**
	 * Arrange for a growl message.
	 *
	 * @param  string|null $title
	 * @param  string|null $message
	 * @param  string|null $type
	 * @return \Laracasts\Flash\FlashNotifier
	 */
	function growl($title = NULL, $message = NULL, $type = '') {
		$growl = app('growl');
		if (!is_null($title) and !is_null($message)) {
			return $growl->add($title, $message, $type);
		}
		return $growl;
	}
}
