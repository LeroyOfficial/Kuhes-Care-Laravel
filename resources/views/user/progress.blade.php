<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Progress';
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
            <h4 class="color-second">Progress Report</h4>
        </div>
        <div>
        </div>
    </div>

    <div class="text-center py-2 mb-4">
        <h2 class="text-capitalize">see you progress</h1>
    </div>

    <div class="d-flex align-items-center justify-content-between px-4 py-2 mb-4">
        <h4>You joined us on {{$client->created_at->format('d M Y')}}</h4>
        <h4>Subscription will expire on {{$client->sub_exp_date}}</h4>

        <a href="{{url('user/generate_progress_report')}}" role="button" class="btn btn-bg-second">
            Generate Report
        </a>
    </div>

    {{-- <div class="">
        <div class="progress">
            <div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">50%</div>
        </div>
    </div> --}}

    <div class="row row-cols-md-2 row-cols-lg-4 py-4 p-2 bg-grey justify-content-center text-center">

        <div class="p-2">
            <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                <div class="text-center mb-3">
                    <img class="vh-30" src="{{asset('assets/img/34986924.jpg')}}">
                </div>
                <div class="text-center">
                    <h4>Chats</h4>
                    <h4>{{$chats->count()}}</h4>
                </div>
                <div class="">
                    <div class="dropdown">
                        <button class="btn color-second" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                            View them
                        </button>
                        <div class="dropdown-menu">
                            @forelse($chats as $chat)
                                @php
                                    $therapist = $therapists->where('id',$chat->therapist_id)->first();
                                @endphp

                                <a class="dropdown-item btn-hover-main" href="{{url('user/chat/'.$chat->id)}}">
                                    <img class="vh-5 me-1" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
                                    {{$therapist->first_name}} {{$therapist->last_name}}
                                </a>
                            @empty
                                <a class="dropdown-item btn-hover-main">
                                    no posts available
                                </a>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-2">
            <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                <div class="text-center mb-3">
                    <img class="vh-30" src="{{asset('assets/img/40079084.jpg')}}">
                </div>
                <div class="text-center">
                    <h4>Posts</h4>
                    <h4>{{$myPosts->count()}}</h4>
                </div>
                <div class="">
                    <div class="dropdown">
                        <button class="btn color-second" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                            View them
                        </button>
                        <div class="dropdown-menu">
                            @forelse ($myPosts as $post)
                                <a class="dropdown-item btn-hover-main" href="{{url('user/peer_chat/post/'.$post->id)}}">
                                    @if ($post->image_url)
                                        <img class="vw-5 me-1" src="{{asset('Post_Pics/'.$post->image_url)}}">
                                    @else
                                        <span class="vw-5 me-1"></span>
                                    @endif
                                    {{$post->title}}
                                </a>
                            @empty
                                <a class="dropdown-item btn-hover-main">
                                    no posts available
                                </a>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-2">
            <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                <div class="text-center mb-3">
                    <img class="vh-30" src="{{asset('assets/img/40079084.jpg')}}">
                </div>
                <div class="text-center">
                    <h4>Comments</h4>
                    <h4>{{$postComments->count() + $videoComments->count() + $bookComments->count()}}</h4>
                </div>
                <div class="">
                    <div class="dropdown">
                        <button class="btn color-second" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                            View them
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item btn-hover-main">
                                Post Comments ({{$postComments->count()}})
                            </a>
                            @forelse ($postComments as $comment)
                                <a class="dropdown-item btn-hover-main" href="{{url('user/peer_chat/post/'.$comment->post_id)}}">
                                    {{-- <img class="vh-5 me-1" src="{{asset('assets/img/34986924.jpg')}}"> --}}
                                    {{$comment->comment}}
                                </a>
                            @empty

                            @endforelse


                            <a class="dropdown-item btn-hover-main mt-3">
                                Video Comments ({{$videoComments->count()}})
                            </a>
                            @forelse ($videoComments as $comment)
                                <a class="dropdown-item btn-hover-main" href="{{url('user/watch_video/'.$comment->video_id.'#'.$comment->comment)}}">
                                    {{-- <img class="vh-5 me-1" src="{{asset('assets/img/34986924.jpg')}}"> --}}
                                    {{$comment->comment}}
                                </a>
                            @empty

                            @endforelse


                            <a class="dropdown-item btn-hover-main mt-3">
                                Book Comments ({{$bookComments->count()}})
                            </a>
                            @forelse ($bookComments as $comment)
                                <a class="dropdown-item btn-hover-main" href="{{url('user/read_book/'.$comment->book_id)}}">
                                    {{-- <img class="vh-5 me-1" src="{{asset('assets/img/34986924.jpg')}}"> --}}
                                    {{$comment->comment}}
                                </a>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.user.auth.footer')

    <script src="{{asset('assets/js/therapistList.js')}}"></script>

</body>

</html>
