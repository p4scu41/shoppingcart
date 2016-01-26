var Helper = {
    alertError: function(message) {
        $('#container_alert').html('<div class="alert alert-danger alert-dismissible fade in" role="alert">\n\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                <span aria-hidden="true">×</span>\n\
            </button>\n\
            <h4>Error</h4>\n\
            <p>' + message + '</p>\n\
        </div>');
    },

    alertInfo: function(message) {
        $('#container_alert').html('<div class="alert alert-warning alert-dismissible fade in" role="alert">\n\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>\n\
            ' + message + '\
        </div>');
    }

};