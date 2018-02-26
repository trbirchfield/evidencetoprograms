angular.module('app').controller('FAQsController', FAQsController);

function FAQsController($scope, $http) {
	// Set data
	var item;
	$http.get('/api/faqcategories/list').success(function(data) {
		$scope.faqcategories = data;
		if (typeof $scope.formData.faq_category_id === 'number') {
			item = _.find($scope.faqcategories, function(v) {
				return v.id === $scope.formData.faq_category_id;
			});
			$scope.formData.faq_category_id = (item !== undefined) ? item : '';
		}
	});
	$http.get('/api/faqs/statuses').success(function(data) {
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
