/**
 * Compile angular modules with $templateCache.
 * `gulp modules`
 */

var gulp = require('gulp'),
	bs   = require('../bootstrap.js');

gulp.task('modules', function() {
	var compile = function(item) {
		return bs.plugins.queue(
				{ objectMode: true },
				gulp.src(item.dependencies || []),
				gulp.src([item.src + '/**/module.js', item.src + '/**/*.js']).pipe(bs.plugins.jshint()).pipe(bs.plugins.jshint.reporter(bs.plugins.stylish)),
				gulp.src(item.src + '/**/*.html').pipe(bs.plugins.templateCache({ module: item.module }))
			)
			.pipe(bs.debug ? bs.plugins.sourcemaps.init() : bs.plugins.gutil.noop())
				.pipe(bs.plugins.concat(item.module + '.js'))
				.pipe(bs.plugins.ngAnnotate())
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

	for (var i = 0; i < bs.config.modules.length; i++) {
		streams.push(compile(bs.config.modules[i]));
	}

	return bs.plugins.es.merge(streams).on('end', version);
});
