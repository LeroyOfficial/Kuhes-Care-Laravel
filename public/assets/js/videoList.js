const API_ENDPOINT = 'http://localhost/kuhes-care/public/user/';

console.log('loaded');

$(document).ready(function() {

    console.log('loaded');

    function searchVideos(searchTerm) {
        if(searchTerm.lenght == 0 || searchTerm.length < 3)
            {
                $('#search-result').addClass('d-none');
                $('#video-list').removeClass('d-none');
                return;
            }

        $.ajax({
            url: API_ENDPOINT+'search_videos/titles',
            type: 'GET',
            data: { name: searchTerm },
            beforeSend: function() {
                $('#video-list').addClass('d-none');
                $('#search-result').removeClass('d-none');
                $("#video-list").html("Searching..."); // Display a loading message
            },
            success: function(response) {
                if (response.success) {
                    if(response.videos)
                        {
                            const videos = response.videos;

                            console.log('search video results ', videos);

                            const resultsHtml = videos.map(video => `
                                <div class="video-result col-md-6 col-lg-3 p-3">
                                    <div>
                                        <a href="/kuhes-care/public/user/watch_video/${video.id}">
                                            <img src="/kuhes-care/public/Video_Thumbnails/${video.thumbnail_url}">
                                        </a>
                                        <div>
                                            <div>
                                                <a class="title color-main fw-semibold fs-4" href="/kuhes-care/public/user/watch_video/${video.id}">${video.title}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `).join("");

                            $('#search-result').removeClass('d-none');
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
        $('#searchTerm').text('"'+searchTerm+'"');

        searchVideos(searchTerm);
    });

    // $("#search-video-list").on("click", ".video-result", function() {
    //     let result = $(this).find('.title').text();
    //     console.log('click result = ', result);
    //     $("#search-video-input").val(result);
    //     $("#search-video-form").submit();
    // })

});


