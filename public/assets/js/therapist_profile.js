const API_ENDPOINT = 'http://localhost/kuhes-care/public/user/';

$(document).ready(function() {

    $('#view-reviews').click(function() {
        $('#therapist-review-div').removeClass('d-none');
        $('#reviews').removeClass('d-none');
    })

    $('.review p').click(function() {
        // $(this).removeClass('text-truncate');
        if($(this).hasClass('text-truncate'))
            {
                $(this).removeClass('text-truncate');
            }
        else
            {
                $(this).addClass('text-truncate');
            }
    })

    $('#first-review-form').click(function() {
        $('#therapist-review-div').removeClass('d-none');

        $('#rate-therapist-form-div').removeClass('d-none');
    })

    $('#show-review-form').click(function() {
        $('#rate-therapist-form-div').removeClass('d-none');
    })

    $('#one-star').click(function(){
        $(this).parent().find('.star').find('.fa-star').removeClass('color-second');
        $(this).find('.fa-star').addClass('color-second');

        $('#star-count-input').val('1');
    })

    $('#two-star').click(function(){
        $(this).parent().find('.star').find('.fa-star').removeClass('color-second');

        $('#one-star').find('.fa-star').addClass('color-second');
        $(this).find('.fa-star').addClass('color-second');

        $('#star-count-input').val('2');
    })

    $('#three-star').click(function(){
        $(this).parent().find('.star').find('.fa-star').removeClass('color-second');

        $('#one-star').find('.fa-star').addClass('color-second');
        $('#two-star').find('.fa-star').addClass('color-second');
        $(this).find('.fa-star').addClass('color-second');

        $('#star-count-input').val('3');
    })

    $('#four-star').click(function(){
        $(this).parent().find('.star').find('.fa-star').removeClass('color-second');

        $('#one-star').find('.fa-star').addClass('color-second');
        $('#two-star').find('.fa-star').addClass('color-second');
        $('#three-star').find('.fa-star').addClass('color-second');
        $(this).find('.fa-star').addClass('color-second');

        $('#star-count-input').val('4');
    })

    $('#five-star').click(function(){
        $(this).parent().find('.star').find('.fa-star').removeClass('color-second');

        $('#one-star').find('.fa-star').addClass('color-second');
        $('#two-star').find('.fa-star').addClass('color-second');
        $('#three-star').find('.fa-star').addClass('color-second');
        $('#four-star').find('.fa-star').addClass('color-second');
        $(this).find('.fa-star').addClass('color-second');

        $('#star-count-input').val('5');
    })
});
