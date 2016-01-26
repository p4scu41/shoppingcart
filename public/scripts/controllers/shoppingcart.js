'use strict';

/**
 * @ngdoc function
 * @name shoppingcartApp.controller:ShoppingcartCtrl
 * @description
 * # ShoppingcartCtrl
 * Controller of the shoppingcartApp
 */
angular.module('shoppingcartApp')
    .controller('ShoppingcartCtrl', function ($scope, $http) {
        $scope.modal = '#shoppingcartModal';
        $scope.container_alert = '#alert_shoppingcart';
        $scope.shoppingcart = {};

        $http.get(Config.url_host + '/shoppingcart/count').then(function(response) {
            $scope.shoppingcart.count_products = response.data;
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });

        $scope.shoppingcart.calSubtotal = function(){
            $scope.shoppingcart.subtotal = 0;
            
            for (var i in $scope.shoppingcart.products) {
                $scope.shoppingcart.subtotal += $scope.shoppingcart.products[i].quantity * $scope.shoppingcart.products[i].detaills.price;
            }
        };
        
        $scope.getDetaills = function(){
            $($scope.container_alert).html('');
            
            $http.get(Config.url_host + '/shoppingcart').then(function(response) {
                $.extend($scope.shoppingcart, response.data);
                $scope.shoppingcart.calSubtotal();

                $($scope.modal).modal('show');
            }, function(response){
                Helper.alertError('Error al obtener los datos');
            });
        };

        $scope.clean = function(){
            $http.delete(Config.url_host + '/shoppingcart').then(function(response) {
                $($scope.modal).modal('hide');
                $scope.shoppingcart.count_products = 0;

                Helper.alertSuccess('Carrito de compras eliminado');
            }, function(response){
                Helper.alertError('Error al obtener los datos');
            });
        };

        $scope.removeProduct = function(id_product){
            $http.delete(Config.url_host + '/shoppingcart/' + id_product).then(function(response) {
                $scope.shoppingcart.count_products = response.data;
                delete $scope.shoppingcart.products[id_product];
                $scope.shoppingcart.calSubtotal();

                Helper.alertSuccess('Producto eliminado del Carrito de compras', $scope.container_alert);
            }, function(response){
                Helper.alertError('Error al obtener los datos');
            });
        };

    });
