angular.module('app').directive('ngUpdateHidden', function() {
	return {
		restrict: 'AE',
		scope: {},
		replace: true,
		require: 'ngModel',
		link: function($scope, elem, attr, ngModel) {
			$scope.$watch(ngModel, function(nv) {
				elem.val(nv);
			});
			elem.change(function() {
				$scope.$apply(function() {
					ngModel.$setViewValue(elem.val());
				});
			});
		}
	};
});
