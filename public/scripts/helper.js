var Helper = {
    alert: function(type, message, container) {
        container = container || Config.container_alert;

        $(container).html('<div class="alert alert-' + type + ' alert-dismissible fade in" role="alert">\n\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                <span aria-hidden="true">×</span>\n\
            </button>\n\
            <p>' + message + '</p>\n\
        </div>');
    },

    alertError: function(message, container) {
        $(container).html(Helper.alert('danger', message, container));
    },

    alertInfo: function(message, container) {
        $(container).html(Helper.alert('warning', message, container));
    },

    alertSuccess: function(message, container) {
        $(container).html(Helper.alert('success', message, container));
    }

};