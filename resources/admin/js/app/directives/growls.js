angular.module('app').directive('growls', growls);

function growls(growl) {
	return {
		restrict: 'AE',
		replace: true,
		scope: true,
		templateUrl: 'templates/growls.html',
		link: function(scope) {
			scope.growls = growl.messages();
			scope.dismiss = function(index) {
				growl.dismiss(index);
			};
		}
	};
}
