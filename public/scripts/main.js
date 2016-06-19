'use strict';
/* global angular */

/**
 * @ngdoc overview
 * @name shoppingcartApp
 * @description
 * # shoppingcartApp
 *
 * Main module of the application.
 */
var shoppingcartApp = angular.module('shoppingcartApp', [
        'ngRoute'
    ])
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'views/products.html',
                controller: 'ProductCtrl'
            })
            .when('/purchase', {
                templateUrl: 'views/purchase.html',
                controller: 'PurchaseCtrl'
            })
            .otherwise({
                redirectTo: '/'
            });
    });