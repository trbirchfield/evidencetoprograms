angular.module('app').controller('ProgramsController', ['$scope', '$location', '$timeout', '$http', '$sce', 'growl', function($scope, $location, $timeout, $http, $sce, growl) {
    // Config
    $scope.program        = {};
    $scope.programs       = [];
    $scope.modalVisible   = false;
    $scope.formData       = {};
    $scope.formProcessing = false;

    // Get programs
    $scope.getPrograms = function(id, event) {
        // TODO: Replace with actual API route once back-end has been configured.
        $http.get('/api/featuredprograms/programs')
            .success(function(data) {
                $scope.programs = data;
                if (id) {
                    $timeout(function() {
                        $scope.showDetail(id, event);
                    });
                }
            }).error(function(data) {
                var title   = 'Failed to get programs';
                var message = 'There was a server error when trying to get the list of programs. Please refresh your page to try again.';
                var type    = 'error';
                growl.add(title, message, type, 7000);
            });
    };

    // Show detail
    $scope.showDetail = function(id, event) {
        if (id) {
            if (typeof event !== 'undefined') {
                event.preventDefault();
            }
            // Check if we have gotten the programs yet
            // If not, get programs first
            if ($scope.programs.length < 1) {
                return $scope.getPrograms(id);
            }

            // Get the program
            $scope.program = _.findWhere($scope.programs, { id: id });

            // Trust the video URL
            $scope.program.video_url = '';
            $scope.program.video_url = $sce.trustAsResourceUrl('https://www.youtube.com/embed/' + $scope.program.video_id);

            // Set program id for comment form
            $scope.formData.program_id = $scope.program.id;

            // Update URL and open modal
            $timeout(function() {
                $location.path('/detail/' + $scope.program.id);
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
            $scope.program = {};
            $('body').removeClass('modal-open');
        });
    };

    // Post comment
    $scope.postComment = function(form, event) {
        event.preventDefault();
        if (form.$invalid) {
            event.preventDefault();
            form.$setSubmitted();
            return;
        }
        if ($scope.formData.program_id) {
            $scope.formProcessing = true;
            // TODO: Replace with actual API route once back-end has been configured.
            $http.post('/api/featuredprograms/comment', withCSRF($scope.formData))
                .success(function(res) {
                    // Success message
                    var title   = 'Your comment has been submitted.';
                    var message = 'We will review it shortly.';
                    var type    = 'success';
                    growl.add(title, message, type, 5000);

                    // Clear form
                    $scope.formData            = {};
                    $scope.formData.program_id = $scope.program.id;
                    $scope.formProcessing      = false;
                    form.$setPristine();
                    form.$setUntouched();
                })
                .error(function(res) {
                    // Error message
                    var title   = 'Your comment failed to submit.';
                    var message = 'Please try submitting it again.';
                    var type    = 'error';
                    growl.add(title, message, type, 5000);

                    // Stop form processing
                    $scope.formProcessing = false;
                });
        }
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
            $scope.program = {};
            $('body').removeClass('modal-open');
        });
    });

    // Helpers
    var withCSRF = function(data) { // TODO: move to utility service?
        data._token = window.csrf;
        return data;
    };
}]);
