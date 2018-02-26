angular.module('app').controller('FeaturedProgramCommentsListController', FeaturedProgramCommentsListController);

function FeaturedProgramCommentsListController($scope, $http) {
	// Set data
	$http.get('/api/featuredprogramcomments/statuses').success(function(data) {
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
