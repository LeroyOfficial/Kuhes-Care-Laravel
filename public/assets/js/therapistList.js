const API_ENDPOINT = 'http://localhost/kuhes-care/public/user/';

console.log('loaded');

$(document).ready(function() {

    console.log('loaded');

    function searchTherapists() {
        if(searchTerm.lenght == 0 || searchTerm.length < 3)
            {
                $('$therapist-list').removeClass('d-none');
                $('#search-therapist-list').addClass('d-none');
                return;
            }

        $.ajax({
            url: API_ENDPOINT+'search_therapists',
            type: 'GET',
            data: { name: searchTerm },
            beforeSend: function() {
                $('#search-therapist-list').removeClass('d-none');
                $("#search-therapist-list").html("Searching..."); // Display a loading message
            },
            success: function(response) {
                if (response.success) {
                    if(response.therapists)
                        {
                            const therapists = response.therapists;
                            console.log('therapist search result ',therapists);

                            const resultsHtml = therapists.map(therapist => `
                                <div id="therapist-${therapist.id}" class="col-md-6 col-lg-3 p-2 m-0">
                                    <div class="bg-white rounded-2">
                                        <img class="rounded-2 rounded-bottom" src="{{asset('Therapist_Pic/'${therapist.image_url})}}">
                                        <div class="py-2 bg-white">
                                            <h6 class="color-second">${therapist.specialist}</h6>
                                            <h4 class="color-main">${therapist.first_name} ${therapist.last_name}</h4>
                                            <div class="d-flex justify-content-between">
                                                <a class="btn btn-bg-second" role="button" href="{{url('user/therapist/'${therapist.id})}}">View Profile</a>
                                                <a class="btn btn-bg-main" role="button" href="{{url('user/new_chat/'${therapist.id})}}">Talk To This Therapist</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `).join("");

                            $('#therapist-list').addClass('d-none');
                            $('#search-therapist-list').removeClass('d-none');
                            $('#search-therapist-list').html(resultsHtml);
                        }
                    }
            }
        })
    }

    $("#search-therapist-input").on("input", function() {
        const searchTerm = $(this).val();

        console.log('search term', searchTerm);

        searchTherapists(searchTerm);
    });
});


