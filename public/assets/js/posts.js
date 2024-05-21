const API_ENDPOINT = 'http://localhost/kuhes-care/public/user/';

$(document).ready(function() {
    function searchPosts(searchTerm) {
        if(searchTerm.lenght == 0 || searchTerm.length < 3)
            {
                $('#search-post-list').addClass('d-none');
                return;
            }

        $.ajax({
            url: API_ENDPOINT+'search_posts/titles',
            type: 'GET',
            data: { name: searchTerm },
            beforeSend: function() {
                $('#search-post-list').removeClass('d-none');
                $("#search-post-list").html("Searching..."); // Display a loading message
            },
            success: function(response) {
                if (response.success) {
                    if(response.posts)
                        {
                            const posts = response.posts;

                            console.log('post search result', posts);

                            const resultsHtml = posts.map(post => `
                                <div class="post-result d-flex mb-1 btn-hover-main" style="cursor: pointer;">
                                    ${post?.image_url ?
                                        `<img style="height:25px; width:25px;" class="me-1" src="/kuhes-care/public/Post_Pics/${post.image_url}">`
                                    :
                                        '<span style="height:25px; width:25px;" class="me-1"></span>'
                                    }
                                    <a class="title" href="/kuhes-care/public/user/peer_chat/post/${post.id}" style="font-size:15px;">${post.title}</a>
                                </div>
                            `).join("");

                            $('#search-post-list').removeClass('d-none');
                            $('#search-post-list').html(resultsHtml);
                        }
                    else
                        {
                            $('#search-post-list').html(response.message);
                        }
                    }
            }
        })
    }

    $("#search-post-input").on("input", function() {
        const searchTerm = $(this).val();

        console.log('search term', searchTerm);

        searchPosts(searchTerm);
    });


    $('#new-post-btn').click(function () {
        $(this).addClass('d-none');
    $('#new-post-div').removeClass('d-none');
    })

    $('#hide-new-post-div-btn').click(function () {
        $('#new-post-btn').removeClass('d-none')
    $('#new-post-div').addClass('d-none');
    })

    var imageinput = document.getElementById("image-input");
    var preview = document.getElementById("preview");

    imageinput.addEventListener("change", function(event){
        if(event.target.files.lenght == 0) {
            $('#img-preview-div').addClass('d-none');
            return;
        }
        $('#img-preview-div').removeClass('d-none');
        var tempUrl = URL.createObjectURL(event.target.files[0]);
        preview.setAttribute("src",tempUrl);
        var style = "max-width:100%; height:30vh; border-radius:10px;";
        preview.setAttribute("style", style);
    })

    $('#add-file-btn').click(function () {
        $('#image-input').click();
    })

    $('.caption').click(function() {
        $(this).removeClass('text-truncate');
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
