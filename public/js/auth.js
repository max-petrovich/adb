// Masked Client Form
$(document).ready(function(){
    $(":input").inputmask({'removeMaskOnSubmit': true, 'autoUnmask': true});
    $(':input[data-inputmask-regex]').inputmask('Regex');

});