/**
 * Cleanup files and prepare for production.
 * `gulp cleanup`
 */

var gulp = require('gulp'),
	bs   = require('../bootstrap.js');

gulp.task('cleanup', function(cb) {
	// Force tasks to ignore debug
	bs.debug = false;

	bs.plugins.del([
		'public/js/**/*',
		'public/css/**/*',
		'public/vendor/**/*',
		'public/fonts/**/*'
	], function() {
		bs.plugins.sequence('default', function() {
			var src = ['public/build/**/*.{js,css}'];
			var manifest = require('../../public/build/rev-manifest.json');
			for (var key in manifest) {
				if (manifest.hasOwnProperty(key)) {
					src.push('!public/build/' + manifest[key]);
				}
			}
			bs.plugins.del(src, cb);
		});
	});
});
