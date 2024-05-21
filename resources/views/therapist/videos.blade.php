<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Videos';
    @endphp
    @include('components.therapist.css')
</head>

<body>
    <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
        <div>
            <a class="btn p-1 btn-hover-second" role="button" href="{{url('therapist/dashboard')}}">
                <i class="fas fa-arrow-left fs-4"></i>
            </a>
        </div>
        <div>
            <h4 class="color-second">Manage Your Videos</h4>
        </div>
        <div>

        </div>
    </div>
    <div class="d-flex justify-content-between px-2 p-1 mb-2">
        <div class=""></div>
        <div>
            <form class="d-flex" action="{{url('therapist/search_videos')}}" method="get">
                <input class="form-control rounded-pill vw-30" type="search" name="search_videos" placeholder="Search videos" required="">
                    <button class="btn" type="submit">
                    <i class="fas fa-search fs-4"></i>
                </button>
            </form>
        </div>
        <div class="">
            <a href="{{url('therapist/new_video')}}" role="button" class="btn btn-bg-main">Add A New Video</a>
        </div>
    </div>
    <div class="row">
        @forelse ($videos as $video)
            <div id="video-{{$video->id}}" class="col-md-6 col-lg-3 p-3">
                <div>
                    <a href="{{url('therapist/video/'.$video->id)}}">
                    <img src="{{asset('Video_Thumbnails/'.$video->thumbnail_url)}}">
                </a>
                    <div>
                        <div class="text-end">
                            <span class="fw-bold">
                            <span class="me-1">{{$video->view_count}}</span>
                            <span>views</span>
                        </span>
                        </div>
                        <div>
                            <a class="color-main fw-semibold fs-4" href="{{url('therapist/video/'.$video->id)}}">{{$video->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <h4>You havent posted any videos yet</h4>
                <h5>click on add new video button</h5>
            </div>
        @endforelse
    </div>
    @include('components.therapist.footer')
    <script src="{{asset('assets/js/videoList.js')}}"></script>
</body>

</html>
