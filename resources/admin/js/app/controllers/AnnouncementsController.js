angular.module('app').controller('AnnouncementsController', AnnouncementsController);

function AnnouncementsController($scope, $http, Util) {
	// Set data
	$http.get('/api/announcements/statuses').success(function(data) {
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

	// Uploads
	$scope.handleFileUpload = function(event, files) {
		event.preventDefault();
		Util.fileUpload('/api/upload', files, function(res) {
			if (res.length) {
				$scope.formData.image     = res[0].name;
				$scope.formData.image_url = res[0].url;
			}
		});
	};
	$scope.removePhoto = function(event) {
		event.preventDefault();
		Util.fileDelete($scope.formData.image, function(res) {
			$scope.formData.image     = '';
			$scope.formData.image_url = '';
		});
	};
}
