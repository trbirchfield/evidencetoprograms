<?php

if (!function_exists('asset_path')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function asset_path($path, $secure = NULL) {
        return app('url')->asset('/public/' . $path, $secure);
    }
}
