angular.module('app').controller('FAQsListController', FAQsListController);

function FAQsListController($scope, $http) {
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
