angular.module('app').controller('BasicFormController', ['$scope', function($scope) {
	$scope.formData = {};
	$scope.submit = function(event, form) {
		// NOTE: we're only handling inline validation,
		//       form submission is handled normally
		if (form.$invalid) {
			event.preventDefault();
			form.$setSubmitted();
			return;
		}
	};
}]);
