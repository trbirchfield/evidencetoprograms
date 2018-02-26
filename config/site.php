<?php
return [
	// Company information
	'client' => [
		'company_name'   => 'Scott & White',
		'tag_line'       => 'This Is Our Tagline.',
		'copyright_year' => date('Y'),
		'address'        => [
			'address1' => 'Grand Lion Plaza',
			'address2' => 'Suite 202',
			'city'     => 'Austin',
			'state'    => 'TX',
			'zip'      => '78701'
		],
		'phone'   => '(555) 481-8819',
		'website' => 'wlion.com',
		'emails'  => [
			'info' => env('EMAIL_INFO', 'evidencetoprograms@sw.org'),
		]
	],

	// Admin
	'admin' => [
		'name'  => 'Administrator',
		'email' => 'admin@wlion.com'
	],

	// Uploads
	'uploads' => [
		'tmp'     => 'tmp',
		'content' => 'public/content'
	],

	'mailchimp' => [
		'list_id' => '4ab1075a64'
	],

	// 301 redirects (original address should be all lowercase)
	'page_maps' => [

	]
];
