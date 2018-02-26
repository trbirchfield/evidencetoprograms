(function() {
	var tocItems = '';
	$('.guide-section').each(function() {
		var sectionSlug  = $(this).attr('id');
		var sectionName = sectionSlug.split('-').join(' ');
		tocItems += '<li><a href="#' + sectionSlug + '">' + sectionName +'</a></li>';
	});
	$('#toc').html(tocItems);

	// Copy html of output tabs to code tabs
	$('.section-output').each(function() {
		var output = $(this).html();
		var code = $(this).siblings('.section-code').children('.section-html');
		code.html(output);
	});

	// Prettyprint
	$('pre').each(function() {
		$(this).addClass('prettyprint');
		var code = $(this).html().trim();
		$(this).html('<code></code>');
		if (/<[a-z][\s\S]*>/i.test(code)) {
			$(this).find('code').text(code);
		} else {
			$(this).find('code').html(code);
		}
	});

	// Bootstrap
	prettyPrint();
	$(document).foundation();
	$('.slick').slick();
}());
