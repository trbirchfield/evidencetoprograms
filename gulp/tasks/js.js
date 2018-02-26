/**
 * Compile js files.
 * `gulp js`
 */

var gulp = require('gulp'),
	bs   = require('../bootstrap.js');

gulp.task('js', function() {
	var compile = function(item) {
		return gulp.src(item.src)
			.pipe(bs.plugins.jshint())
			.pipe(bs.plugins.jshint.reporter(bs.plugins.stylish))
			.pipe(bs.debug ? bs.plugins.sourcemaps.init() : bs.plugins.gutil.noop())
				.pipe(bs.debug ? bs.plugins.gutil.noop() : bs.plugins.uglify())
				.on('error', bs.messages.jsError)
			.pipe(bs.debug ? bs.plugins.sourcemaps.write() : bs.plugins.gutil.noop())
			.pipe(gulp.dest('public/js/' + item.namespace));
	};

	var version = function() {
		return gulp.src('public/js/**/*.js', { base: 'public' })
			.pipe(gulp.dest('public/build'))
			.pipe(bs.plugins.rev())
			.pipe(gulp.dest('public/build'))
			.pipe(bs.plugins.rev.manifest('public/build/rev-manifest.json', { merge: true }))
			.pipe(gulp.dest(''));
	};

	var streams = [];

	for (var i = 0; i < bs.config.js.length; i++) {
		streams.push(compile(bs.config.js[i]));
	}

	return bs.plugins.es.merge(streams).on('end', version);
});
