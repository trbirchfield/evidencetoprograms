/**
 * Avoid console errors in browsers that lack a console.
 */
(function() {
	var method;
	var noop = function() {};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];
		if (!console[method]) {
			console[method] = noop;
		}
	}
})();

/**
 * Growl notifications
 */
(function($) {
	$.growl = function(userOptions) {
		var defaultOptions = {
			title: 'Please enter a title.',
			message: 'Please enter a message.',
			type: '',
			target: '.growls'
		};

		var options  = $.extend({}, defaultOptions, userOptions || {});
		var $item    = $('<li></li>').addClass('growl').addClass(options.type);
		var $title   = $('<div></div>').addClass('growl-title').html(options.title);
		var $message = $('<div></div>').addClass('growl-message').html(options.message);

		$item.on('click', function() {
			$(this).remove();
		});

		$(options.target).append($item.append($title).append($message));
	};

	$.fn.growl = function() {
		this.find('.growl:not([ng-click])').on('click', function() {
			$(this).remove();
		});
	};
})(jQuery);

/**
 * Bootstrap Growl messages.
 */
$('.growls').growl();

/**
 * Sidebar treeview.
 */
(function() {
	var $treeview = $('.nav-sidebar .treeview > a');
	$treeview.on('click', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('active');
	});
})();

/**
 * Fix sidebar height.
 */
(function() {
	var navbarHeight = $('#top-nav').height();
	var $wrapper     = $('.wrapper');

	var fixHeight = function() {
		var windowHeight = $(window).height();
		$wrapper.css('min-height', windowHeight - navbarHeight);
	};
	fixHeight();
	$(window).on('resize', _.debounce(fixHeight, 300));
})();

/**
 * Toggle sidebar.
 */
$('.sidebar-toggle').on('click', function() {
	$('body').toggleClass('sidebar-open');
});
