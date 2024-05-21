<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Article - '.$book->title;
    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
        <div>
            <a class="btn p-1 btn-hover-second" role="button" href="video_list.html">
            <i class="fas fa-arrow-left fs-4"></i>
        </a>
        </div>
        <div>
            <h4 class="color-second">{{$book->title}}</h4>
        </div>
        <div>

        </div>
    </div>
    <div class="d-flex flex-column align-items-center py-4">
        <div class="col-md-8 col-lg-6">
            <div class="vh-50 text-center mb-4">
                <img src="{{asset('Book_Pics/'.$book->image_url)}}">
            </div>
            <div>
                <h1>{{$book->title}}</h1>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <a class="fs-5 color-second fw-semibold" href="{{url('user/therapist/'.$therapist->id)}}">Therapist - {{$therapist->first_name}} {{$therapist->last_name}}</a>
                <span class="fw-semibold">{{$book->created_at->format('d M Y')}}</span>
            </div>
            <div>
                <p>{{$book->details}}</p>
            </div>
            <div id="comment-section">
                <h4 class="mb-4">{{$comments->count()}} comments</h4>
                <div id="comment-list">
                    @forelse ($comments as $comment)
                        <div id="comment-{{$comment->id}}" class="comment row mb-4">
                            <div class="col-1 text-center">
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
                                    </a><span class="fw-bold">{{$comment->createdAt}}</span></div>
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
                                                    <div class="reply row mb-2">
                                                        <div class="col-1 text-center">
                                                            <i class="fas fa-user-circle fs-1 @if($user->where('id',$comment->user_id)->value('user_type') == 'therapist') color-second @else color-main @endif"></i>
                                                        </div>
                                                        <div class="col-11">
                                                            <a href="#"></a>
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
                                            <form method="post" action="{{url('user/reply_on_book_comment/'.$comment->id)}}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-10">
                                                        <textarea class="form-control" name="reply" placeholder="Write your reply" required=""></textarea>
                                                    </div>
                                                    <div class="col-2">
                                                        <button class="btn btn-bg-main" type="submit">Reply</button>
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
                                No comments yet
                            </h4>
                            <h5>be the first to comment</h5>
                        </div>
                    @endforelse
                </div>
                <div>
                    <form method="post" action="{{url('user/book/'.$book->id.'/post_comment')}}">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <textarea class="form-control" name="comment" placeholder="Write your comment" required=""></textarea>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-bg-main" type="submit">Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.user.auth.footer')
    <script src="{{asset('assets/js/read_book.js')}}"></script>
    </script>
</body>

</html>
