<?php

if (!function_exists('asset_version')) {
	/**
	 * Return the correct path for a versioned asset.
	 *
	 * @param  string $file
	 * @return string
	 */
	function asset_version($file) {
		static $manifest = NULL;
		if (is_null($manifest)) {
			$manifest = json_decode(file_get_contents(base_path() . '/public/build/rev-manifest.json'), TRUE);
		}
		if (isset($manifest[$file])) {
			return '/public/build/' . $manifest[$file];
		} else {
			return $file;
		}
	}
}
