angular.module('app').directive('growls', ['growl', '$rootScope', '$timeout', function(growl, $rootScope, $timeout) {
	return {
		restrict: 'AE',
		replace: true,
		scope: true,
		templateUrl: 'templates/growls.html',
		link: function(scope) {
			scope.growls = growl.messages();
			$rootScope.$on('growl', function(event, data) {
				scope.growls = data;
				$timeout(function() {
					scope.$apply();
				});
			});
			scope.dismiss = function(index) {
				growl.dismiss(index);
			};
		}
	};
}]);
