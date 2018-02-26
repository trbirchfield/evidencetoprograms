angular.module('app', ['ngMessages', 'angular-loading-bar', 'ui.bootstrap', 'ui.sortable', 'ngCkeditor', 'ngFileUpload'])
	.config(function(cfpLoadingBarProvider) {
		cfpLoadingBarProvider.includeSpinner = false;
	})
	.config(function($interpolateProvider) {
		$interpolateProvider.startSymbol('<%').endSymbol('%>');
	});
