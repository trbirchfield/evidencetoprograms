/**
 * Move all vendor js files into the public directory.
 * `gulp vendor`
 */

var gulp = require('gulp'),
	bs   = require('../bootstrap.js');

gulp.task('vendor', function() {
	var compile = function() {
		return gulp.src(bs.config.vendor)
			.pipe(bs.plugins.changed('public/vendor'))
			.pipe(bs.debug ? bs.plugins.gutil.noop() : bs.plugins.uglify())
			.on('error', bs.messages.jsError)
			.pipe(gulp.dest('public/vendor'));
	};

	var version = function() {
		return gulp.src('public/vendor/**/*.js', { base: 'public' })
			.pipe(gulp.dest('public/build'))
			.pipe(bs.plugins.rev())
			.pipe(gulp.dest('public/build'))
			.pipe(bs.plugins.rev.manifest('public/build/rev-manifest.json', { merge: true }))
			.pipe(gulp.dest('.'));
	};

	return compile().on('end', version);
});
