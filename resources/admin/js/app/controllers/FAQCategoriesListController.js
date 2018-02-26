angular.module('app').controller('FAQCategoriesListController', FAQCategoriesListController);

function FAQCategoriesListController($scope, $http) {
	// Set data
	$http.get('/api/faqcategories/statuses').success(function(data) {
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
