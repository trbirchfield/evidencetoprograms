<?php namespace App\Http\Client\Composers;

use Request;
use Session;
use Illuminate\View\View;

class LayoutsComposer {
	/**
	 * Setup common output needed for layouts.
	 *
	 * @param  View $view
	 * @return void
	 */
	public function compose(View $view) {
		$view->with([
			'doc_title' => function() use($view) {
				$page_title = ($view->offsetExists('page_title')) ? $view->offsetGet('page_title') : NULL;
				return ((isset($page_title)) ? $page_title . ' | ' : '') . config('site.client.company_name');
			},
			'body_class' => function() use($view) {
				$body_classes = ($view->offsetExists('body_classes')) ? $view->offsetGet('body_classes') : [];
				$class        = '';

				foreach (Request::segments() as $segment) {
					if (is_numeric($segment) or empty($segment)) {
						continue;
					}
					$class .= (!empty($class)) ? '-' . $segment : $segment;
					$body_classes[] = $class;
				}

				return (!empty($body_classes)) ? implode(' ', $body_classes) : 'home';
			},
			'growls' => function() {
				if (Session::has('error')) {
					growl()->add(session('error'), '', 'error');
				} elseif (Session::has('errors')) {
					$errors = session('errors');
					growl()->add('Form errors', '<ul><li>' . implode('</li><li>', $errors->all()) . '</li></ul>', 'error');
				} elseif (Session::has('message')) {
					growl()->add(session('message'), '', 'success');
				} elseif (Session::has('status')) {
					growl()->add(session('status'), '', 'success');
				}
				return json_encode(growl()->all());
			},
			'meta_description' => ($view->offsetExists('meta_description')) ? $view->offsetGet('meta_description') : NULL,
			'meta_keywords'    => ($view->offsetExists('meta_keywords')) ? $view->offsetGet('meta_keywords') : NULL
		]);
	}
}
