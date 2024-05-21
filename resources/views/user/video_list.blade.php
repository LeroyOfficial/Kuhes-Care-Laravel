<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Videos';
    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
        <div>
            <a class="btn p-1 btn-hover-second" role="button" href="{{url('user/dashboard')}}">
                <i class="fas fa-arrow-left fs-4"></i>
            </a>
        </div>
        <div>
            <h4 class="color-second">All Videos</h4>
        </div>
        <div>

        </div>
    </div>

    <div class="d-flex justify-content-center px-2 p-1 mb-2">
        <div>
            <form id="search-video-form" class="d-flex" action="{{url('user/search_videos/full_page')}}" method="get">
                @csrf
                <input id="search-video-input" class="form-control rounded-pill vw-30" type="search" name="search_video" placeholder="Search Videos" required="">
                <button class="btn">
                    <i class="fas fa-search fs-4"></i>
                </button>
            </form>
        </div>
    </div>

    <div id="video-list" class="row">
        @forelse ($videos as $video)
            <div id="video-1" class="col-md-6 col-lg-3 p-3">
                <div>
                    <a href="{{url('user/watch_video/'.$video->id)}}">
                        <img src="{{asset('Video_Thumbnails/'.$video->thumbnail_url)}}">
                    </a>
                    <div>
                        <div class="d-flex justify-content-between">
                            <a class="color-second fw-semibold" href="{{url('user/therapist/'.$video->therapist_id)}}">
                                Therapist -
                                {{$therapist->where('id',$video->therapist_id)->value('first_name')}}
                                {{$therapist->where('id',$video->therapist_id)->value('last_name')}}
                            </a>
                            <span class="fw-bold">
                                <span class="me-1">{{$video->view_count}}</span>
                                <span>views</span>
                            </span>
                        </div>
                        <div>
                            <a class="color-main fw-semibold fs-4" href="{{url('user/watch_video/'.$video->id)}}">
                                {{$video->title}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h1>No Videos Available</h1>
            </div>
        @endforelse
    </div>

    <div id="search-result" class="row d-none">
        <div class="col-12">
            <h4>
                <span id="searchTerm" class="me-1"></span>
                <span>- search results</span>
            </h4>
        </div>
        <div id="search-video-list"></div>
    </div>

    @include('components.user.auth.footer')
    <script src="{{asset('assets/js/VideoList.js')}}">
    </script>
</body>

</html>
