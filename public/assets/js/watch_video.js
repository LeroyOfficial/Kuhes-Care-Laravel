const API_ENDPOINT = 'http://localhost/kuhes-care/public/user/';

$(document).ready(function() {
    function searchVideos(searchTerm) {
        if(searchTerm.lenght == 0 || searchTerm.length < 3)
            {
                $('#search-video-list').addClass('d-none');
                return;
            }

        $.ajax({
            url: API_ENDPOINT+'search_videos/titles',
            type: 'GET',
            data: { name: searchTerm },
            beforeSend: function() {
                $('#search-video-list').removeClass('d-none');
                $("#search-video-list").html("Searching..."); // Display a loading message
            },
            success: function(response) {
                if (response.success) {
                    if(response.videos)
                        {
                            const videos = response.videos;

                            console.log('video search result ',videos);

                            const resultsHtml = videos.map(video => `
                                <div class="video-result d-flex mb-1 btn-hover-main" style="cursor: pointer;">
                                    <img style="height:25px; width:25px;" class="me-1" src="/kuhes-care/public/Video_Thumbnails/${video.thumbnail_url}">
                                    <a class="title" href="/kuhes-care/public/user/watch_video/${video.id}" style="font-size:15px;">${video.title}</a>
                                </div>
                            `).join("");

                            $('#search-video-list').removeClass('d-none');
                            $('#search-video-list').html(resultsHtml);
                        }
                    else
                        {
                            $('#search-video-list').html(response.message);
                        }
                    }
            }
        })
    }

    $("#search-video-input").on("input", function() {
        const searchTerm = $(this).val();

        console.log('search term', searchTerm);

        searchVideos(searchTerm);
    });

    // $("#search-video-list").on("click", ".video-result", function() {
    //     let result = $(this).find('.title').text();
    //     console.log('click result = ', result);
    //     $("#search-video-input").val(result);
    //     $("#search-video-form").submit();
    // })

    $('#show-description-btn').click(function() {
    $(this).addClass('d-none'); $('#description').removeClass('d-none');
    $('#hide-description-btn').removeClass('d-none');
    })

    $('#hide-description-btn').click(function() {
    $(this).addClass('d-none'); $('#description').addClass('d-none');
    $('#show-description-btn').removeClass('d-none');
    })

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
        let video_id = $('#video-id').text();
        let like_btn = $(this);

        $.ajax({
            url: API_ENDPOINT+`video/${video_id}/like`,
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    console.log('like request result ', response)
                    like_btn.find('.like-btn-icon').removeClass('color-main');
                    like_btn.find('.like-btn-icon').addClass('color-second');

                    like_btn.find('.like-count').removeClass('color-main');
                    like_btn.find('.like-count').addClass('color-second');
                    let like_count_span = like_btn.find('.like-count');
                    let new_count = parseFloat(like_count_span.text()) + 1;
                    console.log('new like count ', new_count);
                    like_count_span.text(new_count);
                }
            }
        })
    })
});
