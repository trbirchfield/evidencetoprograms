angular.module('app').controller('FeaturedProgramCommentsController', FeaturedProgramCommentsController);

function FeaturedProgramCommentsController($scope, $http) {
	// Set data
	var item;
	$http.get('/api/featuredprograms/list').success(function(data) {
		$scope.featuredprograms = data;
		if (typeof $scope.formData.featured_program_id === 'number') {
			item = _.find($scope.featuredprograms, function(v) {
				return v.id === $scope.formData.featured_program_id;
			});
			$scope.formData.featured_program_id = (item !== undefined) ? item : '';
		}
	});
	$http.get('/api/featuredprogramcomments/statuses').success(function(data) {
		$scope.statuses = data;
		if (typeof $scope.formData.status === 'number') {
			var item = _.find($scope.statuses, function(v) {
				return v.id === $scope.formData.status;
			});
			$scope.formData.status = (item !== undefined) ? item : '';
		}
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
