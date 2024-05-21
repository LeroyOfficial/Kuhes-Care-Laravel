<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Video Call with Therapist - '. $therapist->where('id',$video_call->therapy_id)->value('first_name');
    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="vh-100 position-fixed overflow-hidden">
        <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
            <div>
                <a class="btn p-1 btn-hover-second" role="button" href="{{url('user/chat/'.$video_call->chat_id)}}">
                    <i class="fas fa-arrow-left fs-4"></i>
                </a>
            </div>
            <div>
                <h4 class="color-second">You are on a video call with {{$therapist->where('id',$video_call->therapy_id)->value('first_name')}} {{$therapist->where('id',$video_call->therapy_id)->value('last_name')}}</h4>
            </div>
            <div></div>
        </div>
        <div class="vh-80 vw-100 position-relative">
            <div class="vh-80 vw-100 bg-main position-absolute">
                <iframe allowfullscreen="" frameborder="0" class="position-relative w-100 h-100" width="560" height="315"></iframe>
            </div>
            <div class="vh-40 vw-30 bg-second position-absolute bottom-0 end-0">
                <iframe allowfullscreen="" frameborder="0" class="position-relative w-100 h-100" width="560" height="315"></iframe>
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
    <script src="{{asset('assets/js/video_call.js')}}">
</body>

</html>
