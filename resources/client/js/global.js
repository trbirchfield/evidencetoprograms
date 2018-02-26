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
 * Bootstrap Foundation.
 */
$(document).foundation();

/**
 * Bootstrap Growl messages.
 */
$('.growls').growl();

// Add a growl message.
// $.growl({
// 	title: 'jQuery plugin',
// 	message: '$.growl({ title:\'\', message:\'\', type: \'\' });',
// 	type: 'success',
// 	target: '.growls'
// });

(function($) {
	function fadeHeader() {
		var window_scroll;
		if ($(window).width() > 300) {
			window_scroll = $(this).scrollTop();
			if (window_scroll > $('#header').height()) {
				$('#secondary-header').fadeIn();
			} else {
				$('#secondary-header').fadeOut('fast');
			}
		}
	}
	// Fading welcome message
	function detectBrowserWidth() {
		if ($(window).width() > 800) {
			$('#header').addClass('fade');
		} else {
			$('#header').removeClass('fade');
		}
	}
	detectBrowserWidth();

	function fadeWelcome() {
		var window_scroll;
		if ($(window).width() > 800) {
			window_scroll = $(this).scrollTop();
			$('.welcome').css({
				'opacity' : 1-(window_scroll/300)
			});
		}
	}

	$('.scroll').localScroll();

	$(window).on('scroll', function() {
		fadeWelcome();
	});

	$('.news-carousel').slick({
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>'
	});

	$('.accordion').on('click', 'dd > a', function(e) {
		e.preventDefault();
		$(this).siblings('.content').slideToggle(300);
		if ($(this).parent().hasClass('active')) {
			$(this).parent().removeClass('active');
		} else {
			$(this).parent().addClass('active');
		}
	});
	$('.toggle-all > a').on('click', function(e) {
		e.preventDefault();
		if ($(this).hasClass('active')) {
			$('.accordion-navigation').removeClass('active');
			$('.accordion-navigation .content').slideUp(300);
			$(this).text('[ Open All ]');
			$(this).removeClass('active');
		} else {
			$('.accordion-navigation').addClass('active');
			$('.accordion-navigation .content').slideDown(300);
			$(this).text('[ Close All ]');
			$(this).addClass('active');
		}
	});

	$(document).on('ready', function() {
		$('#selection-door .accordion').on('click', function(e) {
			e.preventDefault();
			$(this).closest('li').find('.content').not(':animated').slideToggle();
			$(this).toggleClass('entry entry-open');
			$('.final-marker').toggleClass('final-marker final-marker-extended');
		});

		$('#selection-door .accordion2').on('click', function(e) {
			e.preventDefault();
			$(this).closest('li').find('.content').not(':animated').slideToggle();
			$(this).toggleClass('entry entry-open');
			$('.marker-end').toggleClass('marker-end marker-end-extended');
			$(this).toggleClass('green green-no-margin');
		});
	});

	// Resize expanded menus
	var headerHeight = $('.document header').height();
	function positionFooterTabs() {
		var topHeight = $(window).height() - headerHeight;
		$('.info-menu-horizontal').css('height', topHeight);

		// Make sure the tabs meet the bottom of the header
		$('.info-menu-bottom').css('bottom', -1 * topHeight);
		$('.info-menu-bottom2').css('bottom', -1 * topHeight);

		// Ensure open tabs are always on bottom
		$('.info-menu-open').css('bottom', 0);
	}
	positionFooterTabs();

	// Handle functions on window resize
	$(window).on('resize', function() {
		positionFooterTabs();
		detectBrowserWidth();
	});

	// Menu toggles
	var $menuBottom  = $('#info-menu-tc');
	var $showBottom  = $('#info-menu-btn');
	var $menuBottom2 = $('#info-menu-gt');
	var $showBottom2 = $('#info-menu-btn2');

	// Handle toggling of menu tabs
	$showBottom.on('click', function(e) {
		e.preventDefault();

		// Reset the bottom on all to the bottom of the menu
		$('.info-menu-bottom').css('bottom', -1 * ($(window).height() - headerHeight));

		// Swap the open tags
		$('#info-menu-gt').removeClass('info-menu-open');
		classie.toggle(this, 'active');
		classie.toggle($menuBottom[0], 'info-menu-open');

		// Ensure open ones get full display
		$('.info-menu-open').css('bottom', 0);
	});
	$showBottom2.on('click', function(e) {
		e.preventDefault();

		// Reset the bottom on all to the bottom of the menu
		$('.info-menu-bottom').css('bottom', -1 * ($(window).height() - headerHeight));

		// Swap the open tags
		$('#info-menu-tc').removeClass('info-menu-open');
		classie.toggle(this, 'active');
		classie.toggle($menuBottom2[0], 'info-menu-open');

		// Ensure open ones get full display
		$('.info-menu-open').css('bottom', 0);
	});
})(jQuery);
