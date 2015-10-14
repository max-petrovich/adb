// Masked Client Form
$(document).ready(function(){
    $(":input").inputmask({'removeMaskOnSubmit': true});
    $(':input[data-inputmask-regex]').inputmask('Regex');

    $('.confirmDeleteClient').on('click', function() {
        if (confirm('Вы точно хотите удалить клиента?')) {
            return true;
        }
        return false;
    });
});