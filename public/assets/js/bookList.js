const API_ENDPOINT = 'http://localhost/kuhes-care/public/user/';

console.log('loaded');

$(document).ready(function() {

    console.log('loaded');


    function searchBooks(searchTerm) {
        if(searchTerm.lenght == 0 || searchTerm.length < 3)
            {
                $('#search-book-list').addClass('d-none');
                return;
            }

        $.ajax({
            url: API_ENDPOINT+'search_books/titles',
            type: 'GET',
            data: { name: searchTerm },
            beforeSend: function() {
                $('#search-book-list').removeClass('d-none');
                $("#search-book-list").html("Searching..."); // Display a loading message
            },
            success: function(response) {
                if (response.success) {
                    if(response.books)
                        {
                            const books = response.books;

                            const resultsHtml = books.map(book => `
                                <div class="book-result d-flex mb-1 btn-hover-main" style="cursor: pointer;">
                                    <img style="height:25px; width:25px;" class="me-1" src="/kuhes-care/public/Post_Pics/${book.image_url}">
                                    <a class="title" href="/kuhes-care/public/user/peer_chat/post/${book.id}" style="font-size:15px;">${book.title}</a>
                                </div>
                            `).join("");

                            $('#search-book-list').removeClass('d-none');
                            $('#search-book-list').html(resultsHtml);
                        }
                    else
                        {
                            $('#search-book-list').html(response.message);
                        }
                    }
            }
        })
    }

    $("#search-book-input").on("input", function() {
        const searchTerm = $(this).val();

        console.log('search term', searchTerm);

        searchBooks(searchTerm);
    });

});


