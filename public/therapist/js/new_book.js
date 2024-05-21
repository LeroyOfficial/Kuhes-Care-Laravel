const API_ENDPOINT = 'http://localhost/kuhes-care/public/therapist/';

let seconds = 5000;

$(document).ready(function() {

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

    $('#add-image-btn').click(function () {
        $('#image-input').click();
    })
});