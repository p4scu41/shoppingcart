'use strict';

/**
 * @ngdoc function
 * @name shoppingcartApp.controller:ProductCtrl
 * @description
 * # ProductCtrl
 * Controller of the shoppingcartApp
 */
angular.module('shoppingcartApp')
    .controller('ProductCtrl', function ($scope, $http) {
        $(Config.container_spinner).html(Config.icon_spinner);

        $http.get(Config.url_host + '/products').then(function(response) {
            $scope.products = response.data;
            
            $(Config.container_spinner).fadeOut();
            $('[data-toggle="tooltip"]').tooltip();

            if ($scope.products.length == 0) {
                Helper.alertInfo('No se encontraron productos disponibles');
            }
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });

        $scope.addToShoppingCart = function(id_product){
            console.log(id_product);
        };

        $scope.view = function(id_product){
            $http.get(Config.url_host + '/product/' + id_product).then(function(response) {
                $scope.product_detaills = response.data;

                if ($scope.product_detaills == null) {
                    Helper.alertError('Producto no disponible');
                } else {
                    $('#windowModal').modal('show');
                }
            }, function(response){
                Helper.alertError('Error al obtener los datos');
            });
        };
    });
