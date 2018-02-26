/**
 * Move all fonts into the public directory.
 * `gulp fonts`
 */

var gulp = require('gulp'),
	bs   = require('../bootstrap.js');

gulp.task('fonts', function() {
	return gulp.src(bs.config.fonts)
		.pipe(gulp.dest('public/fonts'));
});
