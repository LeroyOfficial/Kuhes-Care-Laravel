<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        // Carbon/Carbon;
        $page_title = 'Therapist - '.$therapist->first_name.' '.$therapist->last_name;
    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="vh-10 bg-main d-flex align-items-center justify-content-between px-2">
        <div>
            <a class="btn p-1 btn-hover-second" role="button" href="{{url('user/dashboard')}}">
                <i class="fas fa-arrow-left fs-4"></i>
            </a>
        </div>
        <div>
            <h4 class="color-second">Therapist Profile</h4>
        </div>
        <div>

        </div>
    </div>
    <div class="p-5 text-center text-capitalize mb-4 d-flex flex-column align-items-center">
        <img class="rounded-circle vh-30 mb-4 border-4 border-second" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
        <h1>{{$therapist->first_name}} {{$therapist->last_name}}</h1>

        <span class="fw-bold text-center">
            @if($therapist_online)
                <span class="d-flex align-items-start justify-self-center">
                    <span class="me-1">Online</span>
                    <i class="fas fa-circle text-success" style="font-size: 10px;"></i>
                </span>
            @else
                @if($therapist_last_seen->isToday())
                    <span>Last Seen Today at {{$therapist_last_seen->format('h:i')}}</span>
                @else
                    @if ($therapist_last_seen->isYesterday())
                        <span>Last Seen Yesterday at {{$therapist_last_seen->format('h:i')}}</span>
                    @else
                        <span>Last Seen on {{$therapist_last_seen->format('d M')}} at {{$therapist_last_seen->format('h:i')}}</span>
                    @endif
                @endif
            @endif
        </span>
        <div class="mt-4 d-flex align-items-center justify-content-around">
            <span class="me-2">
                <i class="fas fa-star @if($therapist_avg_rating >= 1) color-second @else color-main @endif"></i>
                <i class="fas fa-star @if($therapist_avg_rating >= 2) color-second @else color-main @endif"></i>
                <i class="fas fa-star @if($therapist_avg_rating >= 3) color-second @else color-main @endif"></i>
                <i class="fas fa-star @if($therapist_avg_rating >= 4) color-second @else color-main @endif"></i>
                <i class="fas fa-star @if($therapist_avg_rating >= 5) color-second @else color-main @endif"></i>
            </span>

            <span class="fs-6 fw-bold">@if($therapist_avg_rating > 0) {{$therapist_avg_rating}}/5 @else 0/5 @endif</span>
        </div>
            @if ($reviews->count() > 0)
                <span id="view-reviews" class="color-main text-lowercase mt-2" style="cursor: pointer;">view {{$reviews->count()}} @if($reviews->count() > 1) reviews @else review @endif</span>
            @else
                <button id="first-review-form" class="btn text-dark fw-bold color-second text-capitalize fs-5 btn-hover-none">leave a review</button>
            @endif
        <div class="mt-4">
            <a class="btn btn-bg-main fw-bold" role="button" href="{{url('user/new_chat/'.$therapist->id)}}">Chat with this Therapist</a>
        </div>
    </div>

    <div id="therapist-review-div" class="mb-5 d-none">
        <div id="reviews" class="d-none">
            <div class="text-end">
                <i class="fas fas-time text-danger fs-6"></i>
            </div>
            <div id="review-list" class="py-2 px-0 bg-grey d-flex align-content-center justify-content-center overflow-x-auto">
                @forelse ($reviews as $review)
                    <div class="review col-6 col-md-3 p-4">
                        <div class="p-3 rounded text-center bg-white shadow-sm">
                            <div class="mb-2">
                                @if ($client->where('id',$review->client_id)->value('gender') == 'male')
                                    <img class="rounded-circle vh-10" alt="{{$client->where('id',$review->client_id)->value('first_name')}}'s image" src="{{asset('admin/assets/images/faces/4.jpg')}}">
                                @else
                                    <img class="rounded-circle vh-10" alt="{{$client->where('id',$review->client_id)->value('first_name')}}'s image" src="{{asset('admin/assets/images/faces/5.jpg')}}">
                                @endif
                            </div>
                            <div class="">
                                <span class="fw-bold fs-5 mb-2">{{$client->where('id',$review->client_id)->value('first_name')}} {{$client->where('id',$review->client_id)->value('last_name')}}</span>
                                <div class="mt-2 mb-2">
                                    <span class="">
                                        <i class="fas fa-star fs-6 @if($review->star_count >= 1) color-second @else color-main @endif"></i>
                                        <i class="fas fa-star fs-6 @if($review->star_count >= 2) color-second @else color-main @endif"></i>
                                        <i class="fas fa-star fs-6 @if($review->star_count >= 3) color-second @else color-main @endif"></i>
                                        <i class="fas fa-star fs-6 @if($review->star_count >= 4) color-second @else color-main @endif"></i>
                                        <i class="fas fa-star fs-6 @if($review->star_count >= 5) color-second @else color-main @endif"></i>
                                    </span>
                                </div>

                                <p class="text-truncate cursor-pointer" style="cursor: pointer;">{{$review->review}}</p>

                                <span>{{$review->created_at->format('d/m/y')}}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h4>No reviews yet</h4>
                    </div>
                @endforelse
            </div>
        </div>

        @if ($reviews->count() > 0)
            <div class="text-center">
                <button id="show-review-form" class="btn text-dark fw-bold color-second text-capitalize fs-5 btn-hover-none">leave a review</button>
            </div>
        @endif

        <div id="rate-therapist-form-div" class="d-none text-center">
            <h3>Rate Therapist</h3>
            <form id="rate-therapist-form" action="{{url('user/post_review')}}" method="post">
                @csrf
                <div class="d-flex flex-column align-items-center mb-3">
                    <div class="w-40 text-center mb-1">
                        <button type="button" id="one-star" class="btn btn-hover-none star">
                            <i class="fas fa-star color-main fs-5"></i>
                        </button>

                        <button type="button" id="two-star" class="btn btn-hover-none star">
                            <i class="fas fa-star color-main fs-5"></i>
                        </button>

                        <button type="button" id="three-star" class="btn btn-hover-none star">
                            <i class="fas fa-star color-main fs-5"></i>
                        </button>

                        <button type="button" id="four-star" class="btn btn-hover-none star">
                            <i class="fas fa-star color-main fs-5"></i>
                        </button>

                        <button type="button" id="five-star" class="btn btn-hover-none star">
                            <i class="fas fa-star color-main fs-5"></i>
                        </button>
                    </div>
                    <input type="text" name="therapist_id" value="{{$therapist->id}}" class="d-none" required>
                    <input type="text" name="star_count" id="star-count-input" class="d-none" required>
                    <div class="vw-60 mb-2">
                        <label for="review" class="mb-1 text-capitalize fs-6">write a review</label>
                        <textarea name="review" id="review" class="form-control" placeholder="write your review" required></textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-bg-main">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row py-1 mb-5">
        <div class="col-md-6 col-lg-3">
            <h4 class="color-main">About</h4>
            <p>{{$therapist->about}}</p>
        </div>
        <div class="col-md-6 col-lg-3">
            <h4 class="color-second">Qualification</h4>
            <p>{{$therapist->qualification}}</p>
        </div>
        <div class="col-md-6 col-lg-3">
            <h4 class="color-main">Experience</h4>
            <p>{{$therapist->experience}} Years experience</p>
        </div>
        <div class="col-md-6 col-lg-3">
            <h4 class="color-second">Gender</h4>
            <p>{{$therapist->gender}}</p>
        </div>
    </div>

    <div id="videos-posted" class="mb-5">
        <h2>Videos Posted</h2>
        <div class="d-flex overflow-x-auto">
            @forelse ($videos as $video)
                <div id="video-{{$video->id}}" class="col-md-6 col-lg-3 p-3">
                    <div>
                        <a href="{{url('user/watch_video/'.$video->id)}}">
                            <img src="{{asset('Video_Thumbnails/'.$video->thumbnail_url)}}">
                        </a>
                        <div>
                            <div class="d-flex justify-content-end">
                                <span class="fw-bold">
                                    <span class="me-1">{{$video->view_count}}</span>
                                    <span>views</span>
                                </span>
                            </div>
                            <div>
                                <a class="color-main fw-semibold fs-4" href="{{url('user/watch_video/'.$video->id)}}">{{$video->title}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h4>No Videos Published yet</h4>
            @endforelse
        </div>
    </div>

    <div id="books-published" class="mb-5">
        <h2>Books Published</h2>
        <div class="d-flex overflow-x-auto">
            @forelse ($books as $book)
                <div id="book-{{$book->id}}" class="col-md-6 col-lg-3 p-3">
                    <div>
                        <a href="{{url('user/read_book/'.$book->id)}}">
                            <img src="{{asset('Book_Pics/'.$book->image_url)}}" alt="{{$book->title}}">
                        </a>
                        <div>
                            <div class="d-flex justify-content-end">
                                <span class="fw-bold">
                                    <span class="me-1">{{$book->read_count}}</span>
                                    <span>reads</span>
                                </span>
                            </div>
                            <div>
                                <a class="color-main fw-semibold fs-4" href="{{url('user/read_book/'.$book->id)}}">{{$book->title}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h4>No Books Published Yet</h4>
            @endforelse
        </div>
    </div>

    @include('components.user.auth.footer')

    <script src="{{asset('assets/js/therapist_profile.js')}}"></script>
</body>

</html>
