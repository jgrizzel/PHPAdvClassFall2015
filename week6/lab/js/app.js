'use strict';

var myApp = angular.module('myApp', [
    'ngRoute',
    'appControllers',
    'appServices'
]);

myApp.constant('config', {
    "endpoints": {
        "corporation": 'http://localhost/PHPAdvClassFall2015/week5/lab/api/v1/corps'
    },
    "models": {
        "corporation": {
            "corp": '',
            "incorp_dt": '',
            "email": '',
            "owner": '',
            "phone": '',
            "location": ''
        }
    }

});

myApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
                when('/', {
                    templateUrl: 'partials/corporations.html',
                    controller: 'CorporationCtrl'
                }).
                when('/corporation/:ID', {
                    templateUrl: 'partials/corpInfo.html',
                    controller: 'CorporationDetailCtrl'
                }).
                otherwise({
                    redirectTo: '/'
                });
    }]);