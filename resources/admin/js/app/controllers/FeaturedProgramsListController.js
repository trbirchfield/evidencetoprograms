angular.module('app').controller('FeaturedProgramsListController', FeaturedProgramsListController);

function FeaturedProgramsListController($scope, $http) {
	// Set data
	$http.get('/api/featuredprograms/statuses').success(function(data) {
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
