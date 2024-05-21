<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Video Call with Therapist - '. $therapist->where('id',$voice_call->therapy_id)->value('first_name');
    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="vh-100 position-fixed overflow-hidden">
        <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
            <div>
                <a class="btn p-1 btn-hover-second" role="button" href="{{url('user/chat/'.$voice_call->chat_id)}}">
                    <i class="fas fa-arrow-left fs-4"></i>
                </a>
            </div>
            <div>
                <h4 class="color-second">You are on a voice call with {{$therapist->where('id',$voice_call->therapy_id)->value('first_name')}} {{$therapist->where('id',$voice_call->therapy_id)->value('last_name')}}</h4>
            </div>
            <div>
            </div>
        </div>
        <div class="vh-80 vw-100 bg-main d-flex align-items-center justify-content-center text-center">
            <div>
                <h1 class="mb-4">
                    <span>00</span>
                    <span class="mx-1">:</span>
                    <span>00</span>
                </h1>
                <img class="vw-20" src="assets/img/hero_image_04.png">
            </div>
        </div>
        <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-center">
            <div class="px-2">
                <a class="btn p-2 btn-danger btn-hover-main rounded-circle" role="button" href="chat.html">
                <i class="fas fa-phone-slash fs-4 text-white"></i>
            </a>
            </div>
        </div>
    </div>
    @include('components.user.auth.footer')
    <script src="{{asset('assets/js/AgoraRTC_N-4.7.3.js')}}"></script>
    <script src="{{asset('assets/js/voice_call.js')}}">
    </script>
</body>

</html>
