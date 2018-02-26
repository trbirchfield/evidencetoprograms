/**
 * Watch for changes and run appropriate tasks when a change is detected.
 * `gulp watch`
 */

var gulp = require('gulp'),
	bs   = require('../bootstrap.js');

gulp.task('watch', function() {
	gulp.watch([
		'resources/admin/js/**/*.js',
		'!resources/admin/js/app/**/*.js',
		'resources/client/js/**/*.js',
		'!resources/client/js/app/**/*.js'
	], ['js']).on('change', bs.messages.change);
	gulp.watch([
		'resources/admin/js/app/**/*.{js,html}',
		'resources/client/js/app/**/*.{js,html}'
	], ['modules']).on('change', bs.messages.change);
	gulp.watch([
		'resources/admin/scss/**/*.scss',
		'resources/client/scss/**/*.scss'
	], ['css']).on('change', bs.messages.change);
});
