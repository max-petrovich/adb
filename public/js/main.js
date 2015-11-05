// Masked Client Form
$(document).ready(function(){
    $(":input").inputmask({'removeMaskOnSubmit': true, 'autoUnmask': true});
    $(':input[data-inputmask-regex]').inputmask('Regex');

    $(".chosen-select").chosen({width: '100%'});

    $('.confirmDeleteClient').on('click', function() {
        if (confirm('Вы точно хотите удалить клиента?')) {
            return true;
        }
        return false;
    });

    // DEPOSITS
    $("#deposite_type_id").chosen().change(function() {
        var deposit_type_id = $(this).val();
        // Get deposit rates
        $.get(web_root + '/deposit_type/'+deposit_type_id+'/rates', function(r) {
            // Fill select
                $("#rate_id").empty();
                $("#rate_id").append($('<option/>'));
                $.each(r, function( index, value ){
                    $("#rate_id").append('<option value="' + index + '">' + value  + '</option>');
                });
                $("#rate_id").trigger("chosen:updated");

            // ----
            $('#deposit_info_data').hide();
            if (deposit_type_id == 1) {
                $('#deposit_type_2').hide();
            } else {
                $('#deposit_type_2').show();
            }
            $('#deposit_rate_block').show();
        }, 'json');
    });

    $('#rate_id').chosen().change(function() {
        var deposit_rate_id = $(this).val();
        // Get deposit rate info
        $.get(web_root + '/deposit_rate/'+deposit_rate_id, function(r) {
            console.log(r);
            if (r.type_id == 2) {
                $('#contract_term').val(r.term);
                $('#date_expiration').val(moment().add(r.term, 'days').format('YYYY-MM-DD'));
            }

            $('#interest_rate').val(r.interest_rate);
            // -------- SHOW FORM ----
            $('#deposit_info_data').show();
        }, 'json');
    });
});