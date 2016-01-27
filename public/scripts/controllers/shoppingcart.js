'use strict';
/* global angular */

/**
 * @ngdoc function
 * @name shoppingcartApp.controller:ShoppingcartCtrl
 * @description
 * # ShoppingcartCtrl
 * Controller of the shoppingcartApp
 */
angular.module('shoppingcartApp')
    .controller('ShoppingcartCtrl', function ($scope, $http, $location, shoppingcart) {
        $scope.shoppingcart = shoppingcart;

        $scope.purchase = function(){
            $($scope.modal).modal('hide');
            $location.path('/purchase');
            console.log('purcase');
        };

    });
