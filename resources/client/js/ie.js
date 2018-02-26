// PNG fallbacks for SVGs. The file must have the same
// name with a .png extension and the <img> must
// have a class of ie-svg
if (!Modernizr.svg) {
	var regex = /\.(svg)($|\?)/;
	$('img.ie-svg').each(function() {
		var src = $(this).attr('src');
		$(this).attr('src', src.replace(regex, '.png$2'));
	});
}
