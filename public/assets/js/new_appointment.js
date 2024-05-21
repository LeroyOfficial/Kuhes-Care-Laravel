const API_ENDPOINT = 'http://localhost/kuhes-care/public/user/';

$(document).ready(function() {
    $('.therapist').click(function() {
        $('.therapist').removeClass('bg-main');
        $('.therapist').find('h6').addClass('color-second');
        $('.therapist').find('h4').addClass('color-main');

        $(this).addClass('bg-main');
        $(this).find('h6').removeClass('color-second');
        $(this).find('h4').removeClass('color-main');

        console.log('selected therapist ', $(this).find('h4').text() );
        let therapist_id = $(this).find('.therapist_id').text();
        $('#selected-therapist-input').val(therapist_id);
    })
})
