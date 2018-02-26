<?php namespace App\Wlion;

class Growl {
	/**
	 * Message list.
	 *
	 * @var array
	 */
	public $messages = [];

	/**
	 * Get all messages.
	 *
	 * @return array
	 */
	public function all() {
		return $this->messages;
	}

	/**
	 * Add message to list.
	 *
	 * @param string $title
	 * @param string $message
	 * @param string $type
	 */
	public function add($title, $message, $type = '') {
		$this->messages[] = [
			'title'   => $title,
			'message' => $message,
			'type'    => $type
		];

		return $this;
	}
}
