angular.module('app', ['ngMessages', 'ngSanitize'])
    .config(['$interpolateProvider', '$locationProvider', function($interpolateProvider, $locationProvider) {
        $interpolateProvider.startSymbol('<%').endSymbol('%>');
        $locationProvider.html5Mode(false).hashPrefix('!');
    }]);
