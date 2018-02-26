module.exports = {

	// compile js
	js: [{
		namespace: 'admin',
		src: [
			'resources/admin/js/**/*.js',
			'!resources/admin/js/app/**/*.js'
		]
	}, {
		namespace: 'client',
		src: [
			'resources/client/js/**/*.js',
			'!resources/client/js/app/**/*.js'
		]
	}],

	// compile angular modules
	modules: [{
		module: 'app',
		namespace: 'admin',
		src: 'resources/admin/js/app',
		dependencies: [
			'bower_components/angular-messages/angular-messages.min.js',
			'bower_components/angular-loading-bar/build/loading-bar.min.js',
			'bower_components/angular-bootstrap/ui-bootstrap.min.js',
			'bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js',
			'bower_components/angular-ui-sortable/sortable.min.js',
			'bower_components/ng-ckeditor/ng-ckeditor.js',
			'bower_components/danialfarid-angular-file-upload/dist/ng-file-upload-all.js',
			'bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js'
		]
	}, {
		module: 'app',
		namespace: 'client',
		src: 'resources/client/js/app',
		dependencies: [
			'bower_components/angular-messages/angular-messages.min.js',
			'bower_components/angular-sanitize/angular-sanitize.min.js'
		]
	}],

	// compile css
	css: [{
		namespace: 'admin',
		src: 'resources/admin/scss/**/*.scss'
	}, {
		namespace: 'client',
		src:'resources/client/scss/**/*.scss'
	}],

	// move fonts
	fonts: [
		'bower_components/fontawesome/fonts/**/*',
		'bower_components/slick-carousel/slick/fonts/**/*'
	],

	// move vendor files
	vendor: [
		'bower_components/modernizr/modernizr.js',
		'bower_components/bootstrap/dist/js/bootstrap.js',
		'bower_components/jquery/dist/jquery.js',
		'bower_components/jquery-ui/jquery-ui.min.js',
		'bower_components/foundation/js/foundation.js',
		'bower_components/angular/angular.js',
		'bower_components/lodash/lodash.js',
		'bower_components/google-code-prettify/bin/prettify.min.js',
		'bower_components/slick-carousel/slick/slick.js',
		'bower_components/moment/moment.js',
		'bower_components/classie/classie.js',
		'bower_components/jquery.scrollTo/jquery.scrollTo.min.js',
		'bower_components/jquery.localScroll/jquery.localScroll.min.js',
		'bower_components/tooltipster/js/jquery.tooltipster.min.js'
	]
};
