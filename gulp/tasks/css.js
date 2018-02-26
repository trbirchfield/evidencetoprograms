/**
 * Compile scss files into css.
 * `gulp css`
 */

var gulp = require('gulp'),
	bs   = require('../bootstrap.js');

gulp.task('css', function() {
	var compile = function(item) {
		return gulp.src(item.src)
			// Sourcemaps not working with current version of gulp-sass, node-sass, libsass
			// .pipe(bs.debug ? bs.plugins.sourcemaps.init() : bs.plugins.gutil.noop())
				.pipe(bs.plugins.sass({ onError: bs.messages.scssError }))
			// .pipe(bs.debug ? bs.plugins.sourcemaps.write() : bs.plugins.gutil.noop())
			.pipe(bs.plugins.autoprefixer({ browsers: ['> 1%', 'last 5 versions', 'Explorer >= 8'] }))
			.pipe(bs.debug ? bs.plugins.gutil.noop() : bs.plugins.minify({ keepSpecialComments: 0 }))
			.pipe(gulp.dest('public/css/' + item.namespace));
	};

	var version = function() {
		return gulp.src('public/css/**/*.css', { base: 'public' })
			.pipe(gulp.dest('public/build'))
			.pipe(bs.plugins.rev())
			.pipe(gulp.dest('public/build'))
			.pipe(bs.plugins.rev.manifest('public/build/rev-manifest.json', { merge: true }))
			.pipe(gulp.dest('.'));
	};

	var streams = [];

	for (var i = 0; i < bs.config.css.length; i++) {
		streams.push(compile(bs.config.css[i]));
	}

	return bs.plugins.es.merge(streams).on('end', version);
});
