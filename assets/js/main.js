jQuery(document).ready(function() {
    jQuery('.user-register').on('submit', function(e) {
        e.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=Index&m=checkRegister&ajax=1&action=1", function(rep) {
            if(rep == 1) {
                window.location.href = "/qcm/";
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
        ajaxFunction("?c=Index&m=login&ajax=1&action=1", function(rep) {
            if(rep == 1) {
                window.location.href = "/qcm/";
            } else {
                form.prepend('<div class="alert alert-danger">Erreur lors de connexion. Veuillez réessayer.</div>');
                form[0].reset();
                setTimeout(function() {
                    jQuery('.alert').remove();
                }, 3000);
            }
        }, form.serialize());
    });
    jQuery('.user-answer').on('submit', function(e) {
        e.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=Data&m=answer&ajax=1&action=1", function(rep) {
            if(rep > 0) {
                form.find('button').text('Patientez...');
                form.append(' <span class="alert alert-success ml-2">Réponse envoyé.</span>');
                setTimeout(function() {
                    window.location.href = "?c=Data";
                }, 2000);
            } else {
                form.prepend('<div class="alert alert-danger">Erreur lors de votre réponse. Veuillez réessayer.</div>');
                setTimeout(function() {
                    jQuery('.alert').remove();
                }, 3000);
            }
        }, form.serialize());
    });
});