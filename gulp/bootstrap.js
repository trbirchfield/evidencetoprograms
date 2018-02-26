var gutil = require('gulp-util');

module.exports = {
	config: require('./config.js'),
	plugins: {
		autoprefixer: require('gulp-autoprefixer'),
		changed: require('gulp-changed'),
		concat: require('gulp-concat'),
		del: require('del'),
		es: require('event-stream'),
		gutil: gutil,
		jshint: require('gulp-jshint'),
		minify: require('gulp-minify-css'),
		ngAnnotate: require('gulp-ng-annotate'),
		queue: require('streamqueue'),
		rev: require('gulp-rev'),
		sass: require('gulp-sass'),
		sourcemaps: require('gulp-sourcemaps'),
		stylish: require('jshint-stylish'),
		sequence: require('run-sequence'),
		templateCache: require('gulp-angular-templatecache'),
		uglify: require('gulp-uglify')
	},
	debug: (typeof(gutil.env.debug) === 'undefined') ? false : gutil.env.debug,
	messages: {
		change: function(event) {
			return gutil.log(gutil.colors.yellow(event.path.split('/').pop()), 'was', gutil.colors.white(event.type), 'running tasks...');
		},
		jsError: function(error) {
			return gutil.log(gutil.colors.red('error'), 'found in', gutil.colors.yellow(error.fileName.split('/').pop()), 'on', gutil.colors.white('line ' + error.lineNumber));
		},
		scssError: function(error) {
			return gutil.log(gutil.colors.red('error'), 'found in', gutil.colors.yellow(error.file.split('/').pop()), 'on', gutil.colors.white('line ' + error.line + ' col ' + error.column));
		}
	}
};
