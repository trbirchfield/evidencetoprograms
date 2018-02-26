angular.module('app').controller('WidgetsListController', WidgetsListController);

function WidgetsListController($scope, $http) {
	// Set data
	$http.get('/api/widgets/statuses').success(function(data) {
		$scope.statuses = data;
	});

	// Form submission
	$scope.formData = {};
	$scope.submit = function(event, form) {
		if (form.$invalid) {
			event.preventDefault();
			form.$setSubmitted();
			return;
		}
	};
}
