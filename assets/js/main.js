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