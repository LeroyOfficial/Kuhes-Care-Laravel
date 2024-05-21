<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Watch Video - '.$video->title;
    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
        <div>
            <a class="btn p-1 btn-hover-second" role="button" href="{{url('therapist/videos')}}">
            <i class="fas fa-arrow-left fs-4"></i>
        </a>
        </div>
        <div>
            <h4 class="color-second">{{$video->title}}</h4>
        </div>
        <div>

        </div>
    </div>
    <div class="d-flex justify-content-center px-2 py-3 mb-2">
        
    </div>
    <div class="row py-4">
        <div class="col-12">
            <div>
                <video class="w-100" controls="">
                    <source type="video/mp4" src="{{asset('Videos/'.$video->video_url)}}">
                </video>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>{{$video->title}}</h1>
                    <span class="fw-bold">
                        <span class="me-1">{{$video->view_count}}</span>
                        <span>views</span>
                    </span>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <button class="btn like-btn p-1 py-2 mx-1 rounded-circle btn-hover-second d-flex align-items-center" type="button">
                            <i class="far fa-grin-stars fs-4 me-1"></i>
                            <span class="like-count text-dark fs-6 fw-bold">{{$video->like_count}}</span>
                        </button>
                        {{-- <button class="btn p-1 mx-1 rounded-circle btn-hover-second" type="button">
                            <i class="far fa-smile fs-4"></i>
                        </button>
                        <button class="btn p-1 mx-1 rounded-circle btn-hover-second" type="button">
                            <i class="far fa-frown fs-4"></i>
                        </button> --}}
                    </div>
                </div>
                    <span id="video-id" class="video-id d-none">{{$video->id}}</span>
                    <button class="btn btn-hover-none color-second fw-semibold p-0" id="show-description-btn" style="font-size: 12px;">More details</button>
                    <button class="btn d-none btn-hover-none color-second fw-semibold p-0" id="hide-description-btn" style="font-size: 12px;">Hide details</button>

                    <p id="description" class="d-none">{{$video->description}}</p>
            </div>
            <div id="comment-section">
                <h4 class="mb-4">{{$comments->count()}} comments</h4>
                <div id="comment-list">

                    @forelse ($comments as $comment)
                        <div id="comment-{{$comment->id}}" class="comment d-flex mb-4">
                            <div class="me-2 text-center">
                                <i class="fas fa-user-circle fs-1 color-main"></i>
                            </div>
                            <div class="col-11">
                                <div class="d-flex justify-content-between">
                                    <a href="#">
                                        <span class="fs-4">
                                            {{$user->where('id',$comment->user_id)->value('name')}}
                                        </span>
                                        @if($user->where('id',$comment->user_id)->value('user_type') == 'therapist')
                                            <span class="ms-1 bg-second p-1 rounded">Therapist</span>
                                        @endif
                                    </a>
                                    <span class="fw-bold">{{$comment->created_at->format('d M Y')}} at {{$comment->created_at->format('H:i')}}</span>
                                </div>
                                <p>{{$comment->comment}}</p>

                                <div class=".reply-div">
                                    <button class="btn show-replies-btn color-second fw-bold" type="button">
                                        <i class="fas fa-share me-2"></i>
                                        <span>Show Replies</span>
                                    </button>
                                    <button class="btn hide-replies-btn d-none color-second fw-bold" type="button">
                                        <span>Hide Replies</span>
                                    </button>

                                    <div class="replies d-none">
                                        <div class="reply-list py-2">
                                            @forelse ($replies as $reply)
                                                @if($reply->comment_id == $comment->id)
                                                    <div class="reply d-flex mb-2">
                                                        <div class="text-center me-2">
                                                            <i class="fas fa-user-circle fs-1"></i>
                                                        </div>
                                                        <div class="col-11">
                                                            <div class="d-flex justify-content-between">
                                                                <a href="#">
                                                                    <span class="fs-4">
                                                                        {{$user->where('id',$reply->user_id)->value('name')}}
                                                                    </span>
                                                                    @if($user->where('id',$reply->user_id)->value('user_type') == 'therapist')
                                                                        <span class="ms-1 bg-second p-1 rounded">Therapist</span>
                                                                    @endif
                                                                </a>
                                                                <span class="fw-bold">{{$reply->created_at->format('d M Y')}} at {{$reply->created_at->format('H:i')}}</span>
                                                            </div>
                                                            <p>{{$reply->reply}}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty

                                            @endforelse

                                        </div>
                                        <div>
                                            <form method="post" action="{{url('therapist/reply_on_video_comment/'.$comment->id)}}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-10">
                                                        <textarea class="form-control" name="reply" placeholder="Write your reply" required=""></textarea>
                                                    </div>
                                                    <div class="col-2">
                                                        <button class="btn btn-bg-main rounded-pill" type="submit">Reply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <h4>
                                No comments for this video
                            </h4>
                            <h5>be the first to comment</h5>
                        </div>
                    @endforelse
                </div>
                <div>
                    <form method="post" action="{{url('therapist/video/'.$video->id.'/post_comment')}}">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <textarea class="form-control" name="comment" placeholder="Write your comment" required=""></textarea>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-bg-main rounded-pill" type="submit">Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.user.auth.footer')
    <script src="{{asset('assets/js/watch_video.js')}}">
    </script>
</body>

</html>
