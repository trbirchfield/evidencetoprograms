/**
 * Default build task.
 * `gulp`
 */

var gulp = require('gulp'),
	bs   = require('../bootstrap.js');

gulp.task('default', function(cb) {
	bs.plugins.sequence('js', 'modules', 'css', 'vendor', ['fonts'], cb);
});
