var Helper = {
    /**
     * Show a content in console when the value of Config.debug is true
     *
     * @param mixed message Content to show in console, it could be a string or object
     */
    log: function(message) {
        if (Config.debug) {
            console.log(message);
        }
    },

    /**
     * Show a boostrap alert with the message in the container given
     *
     * @param string type Type of the aler: danger, warning, success
     * @param string message Content to show
     * @param string container CSS Selector of the container, default Config.container_alert
     */
    alert: function(type, message, container) {
        container = container || Config.container_alert;

        $(container).html('<div class="alert alert-' + type + ' alert-dismissible fade in" role="alert">\n\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                <span aria-hidden="true">×</span>\n\
            </button>\n\
            <p>' + message + '</p>\n\
        </div>');
    },

    /**
     * Show a boostrap alert error with the message in the container given,
     * use the funciont alert
     *
     * @param string message Content to show
     * @param string container CSS Selector of the container, optional
     */
    alertError: function(message, container) {
        $(container).html(Helper.alert('danger', message, container));
    },

    /**
     * Show a boostrap alert info with the message in the container given,
     * use the funciont alert
     *
     * @param string message Content to show
     * @param string container CSS Selector of the container, optional
     */
    alertInfo: function(message, container) {
        $(container).html(Helper.alert('warning', message, container));
    },

    /**
     * Show a boostrap alert success with the message in the container given,
     * use the funciont alert
     *
     * @param string message Content to show
     * @param string container CSS Selector of the container, optional
     */
    alertSuccess: function(message, container) {
        $(container).html(Helper.alert('success', message, container));
    }

};