jQuery(document).ready(function() {
    jQuery('.admin-login').on('submit', function(event) {
        event.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=Admin&m=adminLogin&ajax=1&action=login", function(rep) {
            if(rep == 1) {
                window.location.href = "?c=Admin&m=dashboard";
            } else {
                alert("Authentication invalide. Veuillez réessayer.");
            }
        }, form.serialize());
    });
});

function ajaxFunction(url, callback, data = [], dataType = 'HTML') {
    jQuery.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: dataType,
        contentType: false,
        processData: false,
        beforeSend: function() {
            jQuery('body').append('<div class="loading">Patientez...</div>');
        },
        error: function(xhr, status, error) {
            alert(error);
        },
        success: callback,
        complete: function() {
            jQuery('.loading').remove();
        }
    });
}