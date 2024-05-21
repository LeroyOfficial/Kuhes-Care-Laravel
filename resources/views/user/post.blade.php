<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Peer Chat Post - '. $post->title;
    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
        <div>
            <a class="btn p-1 btn-hover-second" role="button" href="{{url('user/peer_chat')}}">
            <i class="fas fa-arrow-left fs-4">
            </i>
        </a>
        </div>
        <div>
            <h4 class="color-second">Peer Chat Post - {{$post->title}}</h4>
        </div>
        <div>

        </div>
    </div>
    <div class="py-4 d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="mb-5">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <div class="d-flex align-items-center">
                        <div class="me-2 d-flex align-items-center">
                            <i class="fas fa-user-circle fs-1"></i>
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="fs-4 fw-semibold color-main" href="#">{{$user->where('id', $post->user_id)->value('name')}}</a>
                        </div>
                    </div>
                    <div class=" d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn p-1 btn-hover-none border-0" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                            <i class="fas fa-ellipsis-v fs-4"></i>
                        </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Copy Post Link</a>
                                <a class="dropdown-item" href="#">Report Post</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($post->image_url)
                    <div>
                        <a href="{{url('user/kuhes_chat/post/'.$post->id)}}">
                            <img class="rounded" src="{{asset('Post_Pics/'.$post->image_url)}}">
                        </a>
                    </div>
                @endif
                <div class="py-2">
                    <p>{{$post->caption}}</p>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                        <div>
                            <div>
                                <span class="post-id d-none">{{$post->id}}</span>
                                <button class="like-btn btn btn-hover-none p-1 fs-5 color-second" type="button">
                                    <i class="like-btn-icon fas fa-heart me-1"></i>
                                    <span class="like-count">{{$post->likes_count}}</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-hover-none p-1 color-second fs-5" type="button">
                                <i class="fas fa-comment me-1"></i>
                                <span>{{$comments->count()}}</span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <span class="fw-bold">{{$post->created_at->format('d M Y')}} at {{$post->created_at->format('H:i')}}</span>
                    </div>
                </div>
                <div id="comment-section">
                    <h4 class="mb-4">{{$comments->count()}} comments</h4>
                    <div id="comment-list">
                        @forelse ($comments as $comment)
                        <div id="comment-1" class="comment row mb-4">
                            <div class="col-1 text-center">
                                <i class="fas fa-user-circle fs-1 @if($user->where('id',$comment->user_id)->value('user_type') == 'therapist') color-second @else color-main @endif"></i>
                            </div>
                            <div class="col-11">
                                <div class="d-flex justify-content-between">
                                    <a @if($user->where('id',$comment->user_id)->value('user_type') == 'therapist') 
                                            href="{{url('user/therapist/'.$therapist->where('email', $user->where('id',$comment->user_id)->value('email') )->value('id') )}}" 
                                        @else 
                                            href="#" 
                                        @endif>
                                        <span class="fs-4">
                                            {{$user->where('id',$comment->user_id)->value('name')}}
                                        </span>
                                        @if($user->where('id',$comment->user_id)->value('id') == $post->user_id)
                                            <span class="ms-1 bg-success text-white p-1 rounded">Author</span>
                                        @endif
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
                                                                    @if($user->where('id',$reply->user_id)->value('id') == $post->user_id)
                                                                        <span class="ms-1 bg-success text-white p-1 rounded">Author</span>
                                                                    @endif
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
                                            <form method="post" action="{{url('user/peer_chat/reply_on_post_comment/'.$comment->id)}}">
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
                                No comments yet
                            </h4>
                            <h5>be the first to comment</h5>
                        </div>
                    @endforelse

                    </div>
                    <div>
                        <form method="post" action="{{url('user/peer_chat/post/'.$post->id.'/post_comment')}}">
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
    </div>
    @include('components.user.auth.footer')
    <script src="{{asset('assets/js/post.js')}}"></script>
</body>

</html>
