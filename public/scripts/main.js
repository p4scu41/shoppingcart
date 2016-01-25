'use strict';

/**
 * @ngdoc overview
 * @name shoppingcartApp
 * @description
 * # shoppingcartApp
 *
 * Main module of the application.
 */
angular.module('shoppingcartApp', [
        'ngRoute'
    ])
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'views/products.html',
                controller: 'ProductCtrl'
            })
            .otherwise({
                redirectTo: '/'
            });
    });
