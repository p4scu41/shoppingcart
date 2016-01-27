'use strict';
/* global angular */
/* global Helper */
/* global Config */

/**
 * @ngdoc function
 * @name shoppingcartApp.controller:PurchaseCtrl
 * @description
 * # PurchaseCtrl
 * Controller of the shoppingcartApp
 */
angular.module('shoppingcartApp')
    .controller('PurchaseCtrl', function ($scope, $http, shoppingcart) {
        var modal = '#viewProductModal';
        $scope.shoppingcart = shoppingcart;
        $scope.purchase = {
            tax_percent: 16,
            tax_amount: 100,
            total: 0
        };
        $scope.payment = {
            card_type: '',
            card_number: '',
            expiration_date: ''
        };
        $scope.shipment = {
            country: '',
            state: '',
            city: '',
            zip_code: '',
            street: ''
        };

        /**
         * Calculate the taxes of the shopping cart
         */
        $scope.purchase.calTaxes = function(){
            $scope.purchase.tax_amount = ($scope.purchase.tax_percent/100) * $scope.shoppingcart.subtotal;
            $scope.purchase.total = $scope.purchase.tax_amount + $scope.shoppingcart.subtotal;
        };

        /**
         * Use the promise returned by getDetaills to calculate the taxes after the data loaded
         */
        $scope.shoppingcart.getDetaills(undefined, false).then(function(){
            $scope.purchase.calTaxes();
        });

        /**
         * Send the data to purchase
         */
        $scope.sendPurchase = function(){
            var data = {
                shoppingcart: $scope.shoppingcart,
                payment: $scope.payment,
                shipment: $scope.shipment
            };
            
            $http.post(Config.url_host + '/shoppingcart', data).then(function(response) {
                $scope.shoppingcart.products = {};
                $scope.shoppingcart.subtotal = 0;
                $scope.purchase.calTaxes();
                Helper.alertSuccess('La compra se realizó correctamente', '#container_alert_purchase');
            }, function(response){
                Helper.alertError('Error al obtener los datos');
            });
        };

        /**
         * Show in a modal the detaills of the product
         *
         * @param object product
         */
        $scope.viewProduct = function(product){
            $scope.product = product.detaills;

            $(modal).modal('show');
        };
    });
