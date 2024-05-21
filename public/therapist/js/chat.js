const API_ENDPOINT = 'http://localhost/kuhes-care/public/therapist';

$(document).ready(function() {
    console.log('chat.js loaded');

    $('.chat').click(function() {
        console.log('chat clicked');
        let chat_id = $(this).find('.chat-id').text();
        window.location.href = API_ENDPOINT+'/chat/'+chat_id;
    })

    let messageListDiv = $('#message-list');

    messageListDiv.scrollTop(messageListDiv[0].scrollHeight);

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


    let check_for_new_message_count = 0;
    let seconds = 5000;

    let chat_id = $('#selected-chat-id').text();
    let user_id = $('#user_id').text();
    let client_pic = $('#client_pic').attr("src");
    let therapist_pic = $('#therapist_pic').attr("src");

    let last_message_id = $('#message-list').find('.message:last-child').find('.message-id').text();

    console.log('last message id', last_message_id);

    function checkForNewMessages() {
        $.ajax({
            url: API_ENDPOINT+'/chat/'+chat_id+'/fetch_new_messages',
            type: 'GET',
            data: { last_message_id: last_message_id },
            success: function(response) {
                if (response.success) {
                    console.log('fetch new messages result', response.message)
                    if(response.new_messages)
                        {
                            // $('#unread').remove();

                            let new_messages = response.new_messages;

                            console.log('new messages', new_messages);

                            var newMessagesSpan = $(`
                                <div id="unread" class="unread-div text-center mb-4 p-2">
                                    <span class="fw-bold bg-white rounded-pill p-1 px-2">Unread</span>
                                </div>
                                `);

                            $('#message-list').prepend(newMessagesSpan);

                            new_messages.map(message =>{
                                var newMessage = $(`
                                    <div id="message-${message.id}" class="message ${message.sender_id == user_id ? 'sent' : 'received'} mb-4 d-flex">
                                        <div class="px-2">
                                            <img class="user-pic rounded-circle" src="${client_pic}">
                                        </div>
                                        <div class="message-box p-2 rounded">
                                            ${message?.image_url?
                                                `<a href="/kuhes-care/public/Message_Pics/${message?.image_url}" class="mb-2">
                                                    <img class="rounded" src="/kuhes-care/public/Message_Pics/${message?.image_url}">
                                                </a>`
                                            :
                                                ''
                                            }
                                            <p>${message?.message}</p>
                                            <div class="text-end">
                                                <span>${message?.created_at}</span>
                                            </div>
                                        </div>
                                    </div>
                                `);

                                // Append the new item div to the list
                                $('#message-list').append(newMessage);

                                messageListDiv.scrollTop(messageListDiv[0].scrollHeight);

                                last_message_id = message?.id;
                              })
                        }
                    else
                        {
                            console.log('server response', response.message)
                        }

                } else {
                    console.error('Error checking trip status:', response.message);
                }
            },
            error: function(error) {
                console.error('Error:', error, error.message);
            }
        });

        setTimeout(checkForNewMessages, seconds);
    }

    // checkForNewMessages();

})
