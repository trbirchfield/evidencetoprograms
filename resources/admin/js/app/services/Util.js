angular.module('app').factory('Util', function($q, $http, Upload) {
	return {
		fileUpload: function(route, files, success, error) {
			var queue    = [];
			var _upload  = function(file) {
				return Upload.upload({
					url: route,
					method: 'POST',
					file: file,
					fields: {
						_token: window.csrf
					}
				});
			};
			for (var i = 0; i < files.length; i++) {
				var up = _upload(files[i]);
				queue.push(up);
			}
			$q.all(queue).then(function(data) {
				if (angular.isFunction(success)) {
					var formattedData = [];
					for (var i = 0; i < data.length; i++) {
						formattedData.push(data[i].data);
					}
					return success(formattedData);
				}
			}, function(data) {
				if (angular.isFunction(error)) {
					return error(data);
				}
			});
		},
		fileDelete: function(filename, success, error) {
			$http({
				method: 'DELETE',
				url: '/api/upload',
				params: { file: filename }
			}).success(function(data) {
				if (angular.isFunction(success)) {
					return success(data);
				}
			}).error(function(data) {
				if (angular.isFunction(error)) {
					return error(data);
				}
			});
		}
	};
});
