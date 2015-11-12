$(document).ready(function() {

    $(document).on('change', '#credit_type_id', function() {
        var credit_type_id = $(this).val();
        var credit_rate_id_select = $("#credit_rate_id");
        // Get credit rates
        $.get(web_root + '/credit_type/'+credit_type_id+'/rates', function(r) {
            // Fill select
            credit_rate_id_select.empty();
            credit_rate_id_select.append($('<option/>'));
            $.each(r, function( index, value ){
                credit_rate_id_select.append('<option value="' + index + '">' + value  + '</option>');
            });

            // ----
            $('#credit_info_data').hide();
            $('#credit_rate_block').show();
        }, 'json');
    });

    $(document).on('change', '#credit_rate_id', function() {
        var credit_rate_id = $(this).val();
        // Get credit rate info
        $.get(web_root + '/credit_rate/'+credit_rate_id, function(r) {
            $('#contract_term').val(r.term);
            $('#date_expiration').val(moment().add(r.term, 'months').format('YYYY-MM-DD'));

            $('#interest_rate').val(r.interest_rate);
            // -------- SHOW FORM ----
            $('#credit_info_data').show();
        }, 'json');
    });

    $(document).on('change', '#date_start', function() {
        $('#date_expiration').val(moment($('#date_start').val()).add($('#contract_term').val(), 'months').format('YYYY-MM-DD'));
    });

     // Submit form
    $(document).on('submit', '#creditForm', function() {
        if (confirm('Вы хотите совершить бухгалтерскую проводку?')) {
            return true;
        }
        return false;
    });

});