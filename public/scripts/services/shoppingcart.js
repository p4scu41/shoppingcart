'use strict';
/* global shoppingcartApp */
/* global Helper */
/* global Config */

/**
 * Shopping Cart Service Provider
 */
shoppingcartApp.service('shoppingcart', ['$http', function($http){
    var shoppingcart = {},
        container_alert = '#alert_shoppingcart',
        modal = '#shoppingcartModal';

    $http.get(Config.url_host + '/shoppingcart/count').then(function(response) {
        shoppingcart.count_products = response.data;
    }, function(response){
        Helper.alertError('Error al obtener los datos');
    });

    shoppingcart.calSubtotal = function(){
        shoppingcart.subtotal = 0;

        for (var i in shoppingcart.products) {
            shoppingcart.subtotal += shoppingcart.products[i].quantity * shoppingcart.products[i].detaills.price;
        }
    };

    shoppingcart.getDetaills = function(event){
        if (typeof event != 'undefined') {
            var target = event.target || event.srcElement;

            if (typeof target != 'undefined') {
                $(target).append(Config.icon_spinner);
            }
        }

        $(container_alert).html('');

        $http.get(Config.url_host + '/shoppingcart').then(function(response) {
            $.extend(shoppingcart, response.data);
            shoppingcart.calSubtotal();

            if (typeof target != 'undefined') {
                $(target).find(Config.selector_icon_spinner).fadeOut('slow', function(){$(this).remove()});
            }

            $(modal).modal('show');
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });
    };

    shoppingcart.clean = function(event){
        if (typeof event != 'undefined') {
            var target = event.target || event.srcElement;

            if (typeof target != 'undefined') {
                $(target).append(Config.icon_spinner);
            }
        }

        $http.delete(Config.url_host + '/shoppingcart').then(function(response) {
            $(modal).modal('hide');
            shoppingcart.count_products = 0;

            if (typeof target != 'undefined') {
                $(target).find(Config.selector_icon_spinner).fadeOut('slow', function(){$(this).remove()});
            }

            Helper.alertSuccess('Carrito de compras eliminado');
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });
    };

    shoppingcart.addProduct = function(id_product, modalProduct, event){
        if (typeof event != 'undefined') {
            var target = event.target || event.srcElement;

            if (typeof target != 'undefined') {
                $(target).append(Config.icon_spinner);
            }
        }

        $http.put(Config.url_host + '/shoppingcart/' + id_product).then(function(response) {
            Helper.alertSuccess('Producto agregado al carrito de compras');
            shoppingcart.count_products = response.data;

            if (typeof target != 'undefined') {
                $(target).find(Config.selector_icon_spinner).fadeOut('slow', function(){$(this).remove()});
            }

            if (typeof modalProduct != 'undefined') {
                $(modalProduct).modal('hide');
            }
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });
    };

    shoppingcart.removeProduct = function(id_product, event){
        if (typeof event != 'undefined') {
            var target = event.target || event.srcElement;

            if (typeof target != 'undefined') {
                $(target).append(Config.icon_spinner);
            }
        }

        $http.delete(Config.url_host + '/shoppingcart/' + id_product).then(function(response) {
            shoppingcart.count_products = response.data;
            delete shoppingcart.products[id_product];
            shoppingcart.calSubtotal();

            if (typeof target != 'undefined') {
                $(target).find(Config.selector_icon_spinner).fadeOut('slow', function(){$(this).remove()});
            }

            Helper.alertSuccess('Producto eliminado del Carrito de compras', container_alert);
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });
    };

    return shoppingcart;
}]);