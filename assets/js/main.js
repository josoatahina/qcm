jQuery(document).ready(function() {
    jQuery('.user-register').on('submit', function(e) {
        e.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=User&m=register&ajax=1&action=&register", function(rep) {
            if(rep == 1) {
                window.location.href = "/qcm/?registerSuccess=1";
            } else {
                form.prepend('<div class="alert alert-danger">Erreur lors de l\'inscription. Veuillez réessayer.</div>');
                setTimeout(function() {
                    jQuery('.alert').remove();
                }, 3000);
            }
        }, form.serialize());
    });
    jQuery('.user-login').on('submit', function(e) {
        e.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=User&m=login&ajax=1&action=login", function(rep) {
            if(rep == 1) {
                window.location.href = "/qcm/";
            } else {
                form.prepend('<div class="alert alert-danger">Erreur lors de connexion. Veuillez réessayer.</div>');
                setTimeout(function() {
                    jQuery('.alert').remove();
                }, 3000);
            }
        }, form.serialize());
    });
});

function ajaxFunction(url, callback, data = []) {
    jQuery.ajax({
        url: url,
        type: 'POST',
        data: data,
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
    return false;
}