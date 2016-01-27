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
    
    /**
     * Get the count of products in the shopping cart
     */
    shoppingcart.getCount = function(){
        $http.get(Config.url_host + '/shoppingcart/count').then(function(response) {
            shoppingcart.count_products = response.data;
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });
    };
    
    shoppingcart.getCount();

    /**
     * Calculate the subtotal of the products in the shopping car
     */
    shoppingcart.calSubtotal = function(){
        shoppingcart.subtotal = 0;

        for (var i in shoppingcart.products) {
            shoppingcart.subtotal += shoppingcart.products[i].quantity * shoppingcart.products[i].detaills.price;
        }
    };

    /**
     * Get the deaills of the shopping cart
     *
     * @param object event Event fired
     * @param string showModal CSS selector of the modal to show the information
     * @returns Promise
     */
    shoppingcart.getDetaills = function(event, showModal){
        if (typeof event != 'undefined') {
            var target = event.target || event.srcElement;

            if (typeof target != 'undefined') {
                $(target).append(Config.icon_spinner);
            }
        }

        $(container_alert).html('');

        return $http.get(Config.url_host + '/shoppingcart').then(function(response) {
            $.extend(shoppingcart, response.data);
            shoppingcart.calSubtotal();

            if (typeof target != 'undefined') {
                $(target).find(Config.selector_icon_spinner).fadeOut('slow', function(){$(this).remove()});
            }

            if (showModal) {
                $(modal).modal('show');
            }
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });
    };

    /**
     * Empty the shopping cart
     *
     * @param object event Event fired
     */
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

    /**
     * Add new product to the shopping cart
     *
     * @param number id_product ID of the product to add
     * @param string showModal CSS selector of the modal to show the information
     * @param object event Event fired
     */
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

    /**
     * Set the quantity of the product in the shopping cart
     *
     * @param object product Detaills of the product
     */
    shoppingcart.updateProduct = function(product){
        $http.post(Config.url_host + '/shoppingcart/' + product.detaills.id, {quantity: product.quantity}).then(function(response) {
            
        }, function(response){
            Helper.alertError('Error al procesar los datos');
        });
    };

    /**
     * Remove a product from he shopping cart
     *
     * @param number id_product ID of the product to remove
     * @param object event Event fired
     * @param function callback Function to execute when the process ends
     * @returns Promise
     */
    shoppingcart.removeProduct = function(id_product, event, callback){
        if (typeof event != 'undefined') {
            var target = event.target || event.srcElement;

            if (typeof target != 'undefined') {
                $(target).append(Config.icon_spinner);
            }
        }

        return $http.delete(Config.url_host + '/shoppingcart/' + id_product).then(function(response) {
            shoppingcart.count_products = response.data;
            delete shoppingcart.products[id_product];
            shoppingcart.calSubtotal();

            if (typeof target != 'undefined') {
                $(target).find(Config.selector_icon_spinner).fadeOut('slow', function(){$(this).remove()});
            }

            if (typeof callback == 'function') {
                callback();
            }

            Helper.alertSuccess('Producto eliminado del Carrito de compras', container_alert);
        }, function(response){
            Helper.alertError('Error al obtener los datos');
        });
    };

    return shoppingcart;
}]);