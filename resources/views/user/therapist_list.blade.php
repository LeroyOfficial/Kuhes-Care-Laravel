<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Therapists';
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
            <h4 class="color-second">Therapist List</h4>
        </div>
        <div>

        </div>
    </div>
    <div class="d-flex justify-content-end px-2 py-3 mb-2">
        <div>
            <form class="d-flex justify-content-between vw-70" method="get" target="{{url('user/search_therapists')}}">
                @csrf
                <div class="d-flex">
                    <input id="search-therapist-input" class="form-control rounded-pill vw-30" type="search" name="search_therapist" placeholder="Search Therapist" required="">
                    <button class="btn" type="button">
                    <i class="fas fa-search fs-4">
                    </i>
                </button>
                </div>
                <div>
                    <select class="form-select">
                        <option value="" selected="">Category</option>
                        <option value="mental">Mental Health</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div id="therapist-list" class="row p-2 m-0">
            @forelse ($therapists as $therapist)
                <div id="therapist-{{$therapist->id}}" class="col-md-6 col-lg-3 p-2 m-0">
                    <div class="bg-white rounded-2">
                        <div class="text-center">
                            <img class="rounded-2 vh-20" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
                        </div>
                        <div class="py-2 bg-white">
                            <h6 class="color-second">{{$therapist->specialist}}</h6>
                            <h4 class="color-main">{{$therapist->first_name}} {{$therapist->last_name}}</h4>
                            @php
                                $therapist_avg_rating = number_format($rating->where('therapist_id',$therapist->id)->avg('star_count'), 1);
                            @endphp
                            <div class="d-flex align-items-center justify-content-around mb-2">
                                <span class="me-2">
                                    <i class="fas fa-star @if($therapist_avg_rating >= 1) color-second @else color-main @endif"></i>
                                    <i class="fas fa-star @if($therapist_avg_rating >= 2) color-second @else color-main @endif"></i>
                                    <i class="fas fa-star @if($therapist_avg_rating >= 3) color-second @else color-main @endif"></i>
                                    <i class="fas fa-star @if($therapist_avg_rating >= 4) color-second @else color-main @endif"></i>
                                    <i class="fas fa-star @if($therapist_avg_rating >= 5) color-second @else color-main @endif"></i>
                                </span>

                                <span class="fs-6 fw-bold">@if($therapist_avg_rating > 0) {{$therapist_avg_rating}}/5 @else 0/5 @endif</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a class="btn btn-bg-second" role="button" href="{{url('user/therapist/'.$therapist->id)}}">View Profile</a>
                                <a class="btn btn-bg-main" role="button" href="{{url('user/new_chat/'.$therapist->id)}}">Talk To This Therapist</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h1>No Therapists Available</h1>
                </div>
            @endforelse
    </div>

    <div id="search-therapist-list" class="row p-2 m-0 d-none">
    </div>
    @include('components.user.auth.footer')

    <script>
        console.log('loaded');
    </script>

    <script src="{{asset('assets/js/therapistList.js')}}"></script>

</body>

</html>
