<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler {
	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e) {
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e) {
		if ($this->isHttpException($e)) {
			// Custom handling for 404s
			if ($e instanceof NotFoundHttpException) {
				// Reroute old routes?
				if ($page_maps = \Config::get('site.page_maps', NULL)) {
					// Check if URL contains query params, if so append them
					$path = $request->path();
					if ($request->query()) {
						$path .= '?' . $request->getQueryString();
					}

					// If key exists, 301 redirect to new page
					if (in_array($path, array_keys($page_maps))) {
						return redirect($page_maps[$path], 301);
					}
				}

				// Output response
				return response()->view('client::errors.404', [], 404);
			}

			return $this->renderHttpException($e);
		}

		return parent::render($request, $e);
	}
}
