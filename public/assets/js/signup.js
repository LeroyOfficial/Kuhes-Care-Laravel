$('#next-btn').click(function() {
    $(this).addClass('d-none');
    $('#payment').removeClass('d-none');
    $('#pay-div').removeClass('d-none');
    $('#user-details').addClass('d-none');
    $('#signup-div').addClass('d-none');
})

$('#airtel-div').click(function() {
    $('#airtel-details').removeClass('d-none');
    $('#tnm-details').addClass('d-none');
    $('#trans-id-div').removeClass('d-none');
})

$('#tnm-div').click(function() {
    $('#tnm-details').removeClass('d-none');
    $('#airtel-details').addClass('d-none');
    $('#trans-id-div').removeClass('d-none');
})

$('#trans_id').on('change', function() {
    $('#submit-btn').removeClass('d-none');
})
