jQuery(document).read(function() {
    jQuery('.user-register').on('submit', function(e) {
        e.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=User&m=register&ajax=1&action=&register", function(rep) {
            if(rep == 1) {
                window.location.href = "/qcm/?registerSuccess=1";
            } else {
                jQuery('body').append('<div class="loading alert alert-error">Erreur lors de l\'inscription. Veuillez réessayer.</div>');
                setTimeout(function() {
                    jQuery('.loading').remove();
                }, 3000);
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
            jQuery('body').append('<div class="loading alert alert-warning">Patientez...</div>');
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