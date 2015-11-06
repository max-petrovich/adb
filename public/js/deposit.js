$(document).ready(function() {

    $(document).on('change', '#deposit_type_id', function() {
        var deposit_type_id = $(this).val();
        var deposit_rate_id_select = $("#deposit_rate_id");
        // Get deposit rates
        $.get(web_root + '/deposit_type/'+deposit_type_id+'/rates', function(r) {
            // Fill select
            deposit_rate_id_select.empty();
            deposit_rate_id_select.append($('<option/>'));
            $.each(r, function( index, value ){
                deposit_rate_id_select.append('<option value="' + index + '">' + value  + '</option>');
            });

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

    $(document).on('change', '#deposit_rate_id', function() {
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

    // Submit form
    //$(document).on('submit', '#depositForm', function() {
    //    if (confirm('Вы хотите совершить бухгалтерскую проводку?')) {
    //        return true;
    //    }
    //    return false;
    //});

});