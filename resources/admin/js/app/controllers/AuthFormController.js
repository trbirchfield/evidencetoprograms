angular.module('app').controller('AuthFormController', AuthFormController);

function AuthFormController($scope) {
	$scope.loginFormData = {};
	$scope.resetFormData = {};
	$scope.showLogin     = true;

	$scope.login = function(event, form) {
		if (form.$invalid) {
			event.preventDefault();
			form.$setSubmitted();
			return;
		}
	};

	$scope.reset = function(event, form) {
		if (form.$invalid) {
			event.preventDefault();
			form.$setSubmitted();
			return;
		}
	};
}
