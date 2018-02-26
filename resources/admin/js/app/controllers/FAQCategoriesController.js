angular.module('app').controller('FAQCategoriesController', FAQCategoriesController);

function FAQCategoriesController($scope, $http) {
	// Set data
	$http.get('/api/faqcategories/statuses').success(function(data) {
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
