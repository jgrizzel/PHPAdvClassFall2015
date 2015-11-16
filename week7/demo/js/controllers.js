'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('AddressCtrl', ['$scope', '$log', 'addressProvider', 
    function($scope, $log, addressProvider) {
    
        $scope.addresses = []; // create variable to hold data

        // gets data to put in variable
        function getAddresses() {    
            addressProvider.getAllAddresses().success(function(response) {
                $scope.addresses = response.data;
            }).error(function (response, status) {
               $log.log(response);
            });
        };

        //calls function
        getAddresses();
    
    
}]);

appControllers.controller('AddressDetailCtrl', ['$scope', '$log', '$routeParams', 'addressProvider',
    function($scope, $log, $routeParams, addressProvider) {
    
       var addressID = $routeParams.addressId;
        
       function getAddress() {    
            addressProvider.getAddresses(addressID).success(function(response) {
                $scope.address = response.data;
                $scope.address.birthday = new Date($scope.address.birthday);                
                console.log($scope.address);
            }).error(function (response, status) {
               $log.log(response);
            });
        };

        getAddress();
        
        
    
}]);




