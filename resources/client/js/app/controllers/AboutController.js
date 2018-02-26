angular.module('app').controller('AboutController', ['$scope', '$location', '$timeout', '$http', '$sce', 'growl', function($scope, $location, $timeout, $http, $sce, growl) {
    // Config
    $scope.leader       = {};
    $scope.leaders      = [];
    $scope.modalVisible = false;

    // Get leaders
    $scope.getLeaders = function(id, event) {
        $http.get('/public/packages/leadership.json')
            .success(function(data) {
                $scope.leaders = data;
                if (id) {
                    $timeout(function() {
                        $scope.showDetail(id, event);
                    });
                }
            }).error(function(data) {
                var title   = 'Failed to get leaders';
                var message = 'There was a server error when trying to get the list of leaders. Please refresh your page to try again.';
                var type    = 'error';
                growl.add(title, message, type, 7000);
            });
    };

    // Show detail
    $scope.showDetail = function(slug, event) {
        if (slug) {
            if (typeof event !== 'undefined') {
                event.preventDefault();
            }

            // Check if we have gotten the leaders yet
            // If not, get leaders first
            if ($scope.leaders.length < 1) {
                return $scope.getLeaders(slug);
            }

            // Get the leader
            $scope.leader = _.findWhere($scope.leaders, { slug: slug });

            // Setup the modal header
            $scope.leader.header = $scope.leader.name + ', ' + $scope.leader.degree;

            // Update URL and open modal
            $timeout(function() {
                $location.path('/detail/' + $scope.leader.slug);
                $scope.modalVisible = true;
                $('body').addClass('modal-open');
            });
        }
    };

    // Dismiss detail
    $scope.dismissDetail = function(event) {
        if (typeof event !== 'undefined') {
            event.preventDefault();
        }

        // Hide modal
        $scope.modalVisible = false;
        $('.modal-container').scrollTop(0);

        // Clear form
        $scope.formData = {};
        $scope.commentForm.$setPristine();
        $scope.commentForm.$setUntouched();

        // Update url
        $timeout(function() {
            $location.path('/');
            $scope.leader = {};
            $('body').removeClass('modal-open');
        });
    };

    // Listen for location change and hide or show detail modal accordingly
    $scope.$on('$locationChangeSuccess', function(event) {
        var path = $location.path();

        // Check if we should show a detail view
        if (path.match(/\/detail\//g)) {
            var detail_id = parseInt(path.substr(8,8));
            $scope.showDetail(detail_id);
            return;
        }

        // Show default view
        $scope.modalVisible = false;
        $timeout(function() {
            $scope.leader = {};
            $('body').removeClass('modal-open');
        });
    });

    // Helpers
    var withCSRF = function(data) { // TODO: move to utility service?
        data._token = window.csrf;
        return data;
    };
}]);
