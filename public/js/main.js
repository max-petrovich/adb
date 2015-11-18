// Masked Client Form
$(document).ready(function(){
    $(":input").inputmask({'removeMaskOnSubmit': true, 'autoUnmask': true});
    $(':input[data-inputmask-regex]').inputmask('Regex');

    //$(".chosen-select").chosen({width: '100%'});

    $('.confirmDeleteClient').on('click', function() {
        if (confirm('Вы точно хотите удалить клиента?')) {
            return true;
        }
        return false;
    });


    $(document).on('click', '.getCheckOperation', function(e) {
        $.get(web_root + '/check', {operation: $(this).data('check-operation'), info: $(this).data('check-info')}, function(r) {
            $('#checkModal .modal-content').html(r);
            $('#checkModal').modal();
        });
        e.preventDefault();
    });

    $('#payMobile').on('click', function() {
        if (confirm('Номер телефона введён правильно?')) {
            return true;
        }
        return false;
    });
});