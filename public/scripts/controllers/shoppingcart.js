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
    .controller('ShoppingcartCtrl', function ($scope, $location, shoppingcart) {
        $scope.shoppingcart = shoppingcart;
        $scope.modal = '#shoppingcartModal';

        /**
         * Redirecto to the view purchase
         */
        $scope.purchase = function(){
            $($scope.modal).modal('hide');
            $location.path('/purchase');
        };

    });
