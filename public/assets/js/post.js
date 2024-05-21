const API_ENDPOINT = 'http://localhost/kuhes-care/public/user/';


$(document).ready(function() {

    $('.show-replies-btn').click(function() {
    $(this).addClass('d-none');
        $(this).parent().find('.hide-replies-btn').removeClass('d-none');
    $(this).parent().find('.replies').removeClass('d-none');
    })

    $('.hide-replies-btn').click(function() {
        $(this).addClass('d-none');
    $(this).parent().find('.replies').addClass('d-none');

        $(this).parent().find('.show-replies-btn').removeClass('d-none');
    })

    $('.like-btn').click(function() {
        let post_id = $(this).parent().find('.post-id').text();
        let like_btn = $(this);

        $.ajax({
            url: API_ENDPOINT+`peer_chat/post/${post_id}/like`,
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    console.log('like request result ', response)
                    let like_count_span = like_btn.find('.like-count');
                    let new_count = parseFloat(like_count_span.text()) + 1;
                    console.log('new like count ', new_count);
                    like_count_span.text(new_count);
                }
            }
        })
    })

});
