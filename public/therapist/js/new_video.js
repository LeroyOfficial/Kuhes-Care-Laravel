const API_ENDPOINT = 'http://localhost/kuhes-care/public/therapist/';

let seconds = 5000;

$(document).ready(function() {

    $("#video-input").change(function(event) {
        if (event.target.files.length === 0) {
          $('#video-preview-div').addClass('d-none');
          return;
        }
  
        // Check if the uploaded file is a video
        if (!event.target.files[0].type.startsWith("video/")) {
          alert("Please select a video file.");
          return;
        }
  
        $('#add-thumbnail-div').removeClass('d-none');

        $('#video-preview-div').removeClass('d-none');
  
        var tempUrl = URL.createObjectURL(event.target.files[0]);
        $("#video-preview").attr("src", tempUrl);
    });
  
    $('#add-video-btn').click(function () {
        $('#video-input').click();
    });

    $("#thumbnail-input").change(function(event) {
        if (event.target.files.length === 0) {
          $('#thumbnail-preview-div').addClass('d-none');
          return;
        }

        $('#thumbnail-preview-div').removeClass('d-none');
  
        var tempUrl = URL.createObjectURL(event.target.files[0]);
        $("#thumbnail-preview").attr("src", tempUrl);
    });
  
    $('#add-thumbnail-btn').click(function () {
        $('#thumbnail-input').click();
    });

});