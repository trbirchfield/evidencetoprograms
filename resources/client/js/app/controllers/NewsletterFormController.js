angular.module('app').controller('NewsletterFormController', ['$scope', '$timeout', '$http', 'growl', function($scope, $timeout, $http, growl) {
    $scope.formData       = {};
    $scope.formProcessing = false;

    // Submit newsletter sign up form
    $scope.submit = function(event, form) {
        event.preventDefault();
        if (form.$invalid) {
            event.preventDefault();
            form.$setSubmitted();
            return;
        }

        // Begin form processing
        $scope.formProcessing = true;
        // TODO: Replace with actual API route once back-end has been configured.
        $http.post('/api/subscribe', withCSRF($scope.formData))
            .success(function(res) {
                // Success message
                var title   = 'Thank you!';
                var message = 'You have signed up for our newsletter. You will receive a confirmation email shortly.';
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
                var title   = 'Newsletter sign up failed';
                var message = res.message;
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
