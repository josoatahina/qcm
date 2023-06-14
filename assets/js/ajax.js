function ajaxFunction(url, callback, data = [], dataType = 'text') {
    jQuery.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: dataType,
        beforeSend: function() {
            jQuery('body').append('<div class="dialog notification alert alert-warning">Patientez...</div>');
        },
        error: function(xhr, status, error) {
            alert(error);
        },
        success: callback,
        complete: function() {
            jQuery('.notification').remove();
        }
    });
    return false;
}