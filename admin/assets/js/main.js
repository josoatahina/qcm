jQuery(document).ready(function() {
    jQuery('.admin-login').on('submit', function(e) {
        e.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=Admin&m=login&ajax=1&action=login", function(rep) {
            if(rep == 1) {
                window.location.href = "/qcm/admin/";
            } else {
                form.prepend('<div class="alert alert-danger">Erreur lors de connexion. Veuillez réessayer.</div>');
                setTimeout(function() {
                    jQuery('.alert').remove();
                }, 3000);
            }
        }, form.serialize());
    });
    jQuery('.admin-add-qcm').on('submit', function(e) {
        e.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=Qcm&m=addQcm&ajax=1&action=add", function(rep) {
            if(rep && rep.success == 1) {
                window.location.href = "/qcm/admin?c=Qcm&m=view&id="+rep.id;
            } else {
                form.prepend('<div class="alert alert-danger">Erreur lors de l\'ajout. Veuillez réessayer.</div>');
                setTimeout(function() {
                    jQuery('.alert').remove();
                }, 3000);
            }
        }, form.serialize(), 'json');
    });
    jQuery('.admin-update-qcm').on('submit', function(e) {
        e.preventDefault();
        var form = jQuery(this);
        ajaxFunction("?c=Qcm&m=update&ajax=1&action=update", function(rep) {
            if(rep == 1) {
                jQuery('body').append('<div class="dialog alert alert-success">Mise à jour avec succès.</div>');
                setTimeout(function() {
                    jQuery('.dialog').remove();
                }, 3000);
            } else {
                jQuery('body').append('<div class="dialog alert alert-danger">Erreur lors de la mise à jour. Veuillez réessayer.</div>');
                setTimeout(function() {
                    jQuery('.dialog').remove();
                }, 3000);
            }
        }, form.serialize());
    });
});

function deleteQcm(id) {
    if(confirm("Voulez-vous supprimer cette QCM ?")) {
        ajaxFunction("?c=Questionnaire&m=deleteQcm&ajax=1&action=delete", function(rep) {
            if(rep == 1) {
                window.location.href = "/qcm/admin?c=Qcm";
            }
        }, {id:id});
    }
}

function addQuestion() {
    ajaxFunction("?c=Questionnaire&m=addMoreQuestion&ajax=1&action=add", function(rep) {
        jQuery('.info-questionnaire').append(rep);
    }, {index:jQuery('.add-more-question').length + 1}, 'html');
}

function addOption(i) {
    ajaxFunction("?c=Questionnaire&m=addMoreOptions&ajax=1&action=add", function(rep) {
        jQuery('.info-options-'+i).append(rep);
    }, {index:jQuery('.info-options- '+i+' .add-more-option').length + 1}, 'html');
}