angular.module('app').controller('AnnouncementsListController', AnnouncementsListController);

function AnnouncementsListController($scope, $http) {
	// Set data
	$http.get('/api/announcements/statuses').success(function(data) {
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
