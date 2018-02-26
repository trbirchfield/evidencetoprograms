<?php
// Development
Route::group(['middleware' => 'dev_only', 'prefix' => 'test', 'namespace' => 'App\Http\Client\Controllers\Test'], function() {
	$files = glob(app_path() . '/Http/Client/Controllers/Test/*.php');
	foreach ($files as $file) {
		$route = str_replace('Controller', '', basename($file, '.php'));
		if ($route == 'Base') { continue; }
		$route = strtolower(preg_replace('/(?<=\\w)[A-Z]/', '-$0', $route));
		Route::controller($route, basename($file, '.php'));
	}
});

// Utility routes
Route::group(['namespace' => 'App\Http\Controllers'], function() {
	// Queues
	Route::group(['prefix' => 'queue', 'middleware' => 'queues'], function() {
		Route::post('receive', ['uses' => 'QueueController@postReceive']);
	});
});

// Restrict non-production access
Route::group(['middleware' => 'non_production'], function() {
	// Admin
	Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Admin\Controllers'], function() {
		Route::group(['middleware' => 'guest.admin'], function() {
			Route::controller('login', 'AuthController', [
				'getIndex'  => 'admin.login',
				'postIndex' => 'admin.login.attempt'
			]);
		});
		Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@getLogout']);
		Route::controller('password', 'AuthController', [
			'getReset'  => 'admin.password.reset',
			'postReset' => 'admin.password.update',
			'postEmail' => 'admin.password.email'
		]);
		Route::group(['middleware' => 'auth.admin'], function() {
			Route::controller('dashboard', 'DashboardController', [
				'getIndex' => 'admin.dashboard'
			]);
			Route::controller('announcements', 'AnnouncementsController', [
				'getIndex' => 'admin.announcements',
				'getEdit'  => 'admin.announcements.edit'
			]);
			Route::controller('faqcategories', 'FAQCategoriesController', [
				'getIndex' => 'admin.faqcategories',
				'getEdit'  => 'admin.faqcategories.edit',
				'getOrder' => 'admin.faqcategories.order'
			]);
			Route::controller('faqs', 'FAQsController', [
				'getIndex' => 'admin.faqs',
				'getEdit'  => 'admin.faqs.edit'
			]);
			Route::controller('featuredprograms', 'FeaturedProgramsController', [
				'getIndex' => 'admin.featuredprograms',
				'getEdit'  => 'admin.featuredprograms.edit',
				'getOrder' => 'admin.featuredprograms.order'
			]);
			Route::controller('featuredprogramcomments', 'FeaturedProgramCommentsController', [
				'getIndex' => 'admin.featuredprogramcomments',
				'getEdit'  => 'admin.featuredprogramcomments.edit'
			]);
			Route::controller('widgets', 'WidgetsController', [
				'getIndex' => 'admin.widgets',
				'getEdit'  => 'admin.widgets.edit'
			]);
			Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@getIndex']);
		});
	});

	// API
	Route::group(['prefix' => 'api', 'namespace' => 'App\Http\Api\Controllers', 'middleware' => ['csrf', 'cors']], function() {
		Route::controller('announcements',           'AnnouncementsController');
		Route::controller('faqcategories',           'FAQCategoriesController');
		Route::controller('faqs',                    'FAQsController');
		Route::controller('widgets',                 'WidgetsController');
		Route::controller('upload',                  'UploadController');
		Route::controller('subscribe',               'SubscribeController');
		Route::controller('featuredprograms',        'FeaturedProgramsController');
		Route::controller('featuredprogramcomments', 'FeaturedProgramCommentsController');
	});

	// Client
	Route::group(['namespace' => 'App\Http\Client\Controllers'], function() {
		Route::group(['middleware' => 'guest'], function() {
			Route::controller('login', 'AuthController', [
				'getIndex'  => 'login',
				'postIndex' => 'login.attempt'
			]);
		});
		Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);
		Route::controller('password', 'AuthController', [
			'getReset'  => 'password.reset',
			'postReset' => 'password.update',
			'postEmail' => 'password.email'
		]);
		Route::group(['middleware' => 'auth'], function() {

		});
		Route::get('sitemap.xml',                      ['as' => 'sitemap-xml', 'uses' => 'SitemapController@getXml']);
		Route::get('sitemap',                          ['as' => 'sitemap',     'uses' => 'SitemapController@getIndex']);
		Route::get('section/{section?}/{subsection?}', ['as' => 'section',     'uses' => 'SectionController@getIndex']);
		Route::get('programs',                         ['as' => 'programs',    'uses' => 'ProgramsController@getIndex']);
		Route::get('faq',                              ['as' => 'faq',         'uses' => 'FaqController@getIndex']);
		Route::get('search',                           ['as' => 'search',      'uses' => 'SearchController@getIndex']);
		Route::get('about',                            ['as' => 'about',       'uses' => 'AboutController@getIndex']);
		Route::get('contact',                          ['as' => 'contact',     'uses' => 'ContactController@getIndex']);
		Route::post('contact',                         ['as' => 'contact',     'uses' => 'ContactController@postIndex']);
		Route::get('privacy',                          ['as' => 'privacy',     'uses' => 'PrivacyController@getIndex']);
		Route::get('home',                             ['as' => 'home',        'uses' => 'HomeController@getIndex']);
		Route::get('/',                                ['as' => 'default',     'uses' => 'HomeController@getIndex']);
	});
});
