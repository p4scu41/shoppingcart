'use strict';
/* global angular */
/* global Helper */
/* global Config */

/**
 * @ngdoc function
 * @name shoppingcartApp.controller:ProductCtrl
 * @description
 * # ProductCtrl
 * Controller of the shoppingcartApp
 */
angular.module('shoppingcartApp')
    .controller('ProductCtrl', function ($scope, $http, shoppingcart) {
        $(Config.container_spinner).html(Config.icon_spinner);
        $scope.modal = '#productModal';
        $scope.shoppingcart = shoppingcart;

        /**
         * Get all the products availables
         */
        $scope.getProducts = function() {
            $http.get(Config.url_host + '/products').then(function(response) {
                $scope.products = response.data;

                $(Config.container_spinner).fadeOut('slow');
                $('[data-toggle="tooltip"]').tooltip();

                if ($scope.products.length == 0) {
                    Helper.alertInfo('No se encontraron productos disponibles');
                }
            }, function(response){
                Helper.alertError('Error al obtener los datos');
                console.log('Error: ' + response.status + ': ' + response.statusText);
            });
        };
        
        $scope.getProducts();

        /**
         * Show a specific product in a boostrap modal
         *
         * @param number id_product ID of the product to show
         * @param object event Event fired
         */
        $scope.view = function(id_product, event){
            if (typeof event != 'undefined') {
                var target = event.target || event.srcElement;

                if (typeof target != 'undefined') {
                    $(target).append(Config.icon_spinner);
                }
            }

            $http.get(Config.url_host + '/product/' + id_product).then(function(response) {
                $scope.product_detaills = response.data;

                if (typeof target != 'undefined') {
                    $(target).find(Config.selector_icon_spinner).fadeOut('slow', function(){$(this).remove()});
                }

                if ($scope.product_detaills == null) {
                    Helper.alertError('Producto no disponible');
                } else {
                    $($scope.modal).modal('show');
                }
            }, function(response){
                Helper.alertError('Error al obtener los datos');
            });
        };
    });
