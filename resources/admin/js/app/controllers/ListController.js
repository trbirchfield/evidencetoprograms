angular.module('app').controller('ListController', ListController);

function ListController($scope, $http, $location, $modal) {
	$scope.filterFormData = {};
	$scope.filtersActive  = false;

	// Pagination
	$scope.totalItems    = 0;
	$scope.currentPage   = 1;
	$scope.perPageSelect = [5, 10, 25, 50];
	$scope.itemsPerPage  = $scope.perPageSelect[2];
	$scope.setPage       = function(pageNum) {
		$scope.currentPage = pageNum;
		$scope.getList();
	};

	// Reorder
	$scope.changeOrder = function(colname) {
		if ($scope.orderBy === colname) {
			if ($scope.orderDir === 'desc') {
				$scope.orderDir = 'asc';
			} else {
				$scope.orderDir = 'desc';
			}
		} else {
			$scope.orderBy  = colname;
			$scope.orderDir = 'asc';
		}
		$scope.getList();
	};

	// Bootstrap
	$scope.init = function(bootstrap) {
		$scope.route    = bootstrap.route;
		$scope.fields   = bootstrap.fields;
		$scope.orderBy  = bootstrap.orderBy;
		$scope.orderDir = bootstrap.orderDir;
		$scope.node     = bootstrap.node;
		$scope.getList();
	};

	// Create list
	$scope.getList = function() {
		var filterFormData = {
			'limit': $scope.itemsPerPage,
			'offset': ($scope.currentPage - 1) * $scope.itemsPerPage,
			'order_by': $scope.orderBy,
			'order_dir': $scope.orderDir
		};
		if ($scope.filtersActive) {
			for (var key in $scope.filterFormData) {
				if ($scope.filterFormData.hasOwnProperty(key)) {
					if ($scope.filterFormData[key]) {
						filterFormData[key] = (typeof $scope.filterFormData[key] === 'object') ? $scope.filterFormData[key].id : $scope.filterFormData[key];
					}
				}
			}
		}
		var route = $scope.route + '?';
		for (var item in filterFormData) {
			if (filterFormData.hasOwnProperty(item)) {
				route += item + '=' + filterFormData[item] + '&';
			}
		}
		route.slice(0, -1);
		$http.get(route)
			.success(function(data) {
				$scope.data        = data.data;
				$scope.totalCount  = data.total;
				$scope.filterCount = data.filtered;
				$scope.totalItems  = ($scope.filterCount > $scope.totalCount) ? $scope.filterCount  : $scope.totalCount;
			});
	};

	$scope.toggleStatus = function(route, index) {
		$http.post(route, {})
			.success(function() {
				// TODO: display success message?
			})
			.error(function() {
				$scope.data[index].toggle = !$scope.data[index].toggle;
			});
	};

	$scope.applyFilters = function() {
		if (!$scope.isEmpty($scope.filterFormData)) {
			$scope.filtersActive = true;
			$scope.getList();
		}
	};

	$scope.clearFilters = function() {
		$scope.filtersActive = false;
		$scope.filterFormData = {};
		$scope.getList();
	};

	$scope.isEmpty = function(obj) {
		return (_.isEmpty(obj)) ? true : false;
	};

	$scope.openDeleteModal = function(route, id) {
		var modalInstance = $modal.open({
			templateUrl: 'templates/modal/delete.html',
			controller: ['$scope', '$modalInstance', 'route', 'id', function($scope, $modalInstance, route, id) {
				$scope.submit = function() {
					return $http.post(route, {id: id})
						.success(function() {
							$modalInstance.close();
						})
						.error(function() {
							// TODO: display error
						});
				};
				$scope.cancel = function() {
					$modalInstance.dismiss('Cancel');
				};
			}],
			backdrop: 'static',
			keyboard: false,
			size: 'md',
			resolve: {
				route: function() {
					return route;
				},
				id: function() {
					return id;
				}
			}
		});

		modalInstance.result.then(function() {
			$scope.getList();
		});
	};
}
