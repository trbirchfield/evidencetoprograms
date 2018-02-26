angular.module('app').controller('FaqController', ['$scope', '$timeout', '$http', 'growl', function($scope, $timeout, $http, growl) {
    // Config
    $scope.formData       = {};
    $scope.activeCategory = 1;
    $scope.categories     = [];
    $scope.questions      = [];
    $scope.formProcessing = false;

    // Get FAQ
    // TODO: Replace with actual API route once back-end has been configured.
    $http.get('/api/faqcategories/categories')
        .success(function(data) {
            $scope.categories = data;
            $scope.activeCategory = $scope.categories[0].id;
        }).error(function(data) {
            // Error message
            var title   = 'Failed to get FAQs';
            var message = 'There was a server error when trying to get the FAQs. Please refresh your page to try again.';
            var type    = 'error';
            growl.add(title, message, type, 7000);
        });

    // Change active category
    $scope.changeCategory = function(event, id) {
        $scope.activeCategory = id;
    };

    // Submit new question form
    $scope.submitQuestion = function(event, form) {
        event.preventDefault();
        if (form.$invalid) {
            event.preventDefault();
            form.$setSubmitted();
            return;
        }

        // Begin form processing
        $scope.formProcessing = true;
        $http.post('/api/faqs/ask-question', withCSRF($scope.formData))
            .success(function(res) {
                // Success message
                var title   = 'Your question has been sent.';
                var message = 'We will review it and respond with an answer as soon as possible.';
                var type    = 'success';
                growl.add(title, message, type, 7000);

                // Clear form
                $scope.formData       = {};
                $scope.formProcessing = false;
                form.$setPristine();
                form.$setUntouched();
            })
            .error(function(res) {
                // Error message
                var title   = 'Your question failed to send.';
                var message = 'Please try submitting it again.';
                var type    = 'error';
                growl.add(title, message, type, 5000);

                // Stop form processing
                $scope.formProcessing = false;
            });
    };

    // Helpers
    var withCSRF = function(data) { // TODO: move to utility service?
        data._token = window.csrf;
        return data;
    };
}]);
