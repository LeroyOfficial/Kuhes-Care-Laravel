<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Peer Chat';
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
            <h4 class="color-second">Peer Chat</h4>
        </div>
        <div>
    </div>
    </div>
    <div class="d-flex justify-content-end px-2 py-3 mb-2">
        <div class="d-flex justify-content-between vw-70">
            <form class="" method="get" action="{{url('therapist/search_posts')}}">
                @csrf
                <div class="d-flex">
                    <input class="form-control rounded-pill vw-30" type="search" name="search_posts" placeholder="Search Posts" required="">
                    <button class="btn" type="submit">
                        <i class="fas fa-search fs-4"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="py-4 d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            {{-- jhkd jkkdgd fiiogsdfho u fhoggdooxkf gnngsodjsfdon nosjg dnfohndfig nphdfk a bsuo pndfkh sfdp lmjfdo ns vydihyfg ndofdp nsggod snvf yasbpsg nsood fpnp --}}
            @forelse ($posts as $post)
                <div id="post-{{$post->id}}" class="mb-5">
                    <div class="row align-items-center justify-content-bentween mb-1">
                        <div class="col-11 p-0 d-flex">
                            <div class="p-0 me-2 d-flex align-items-center">
                                <i class="fas fa-user-circle fs-1"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <a class="fs-4 fw-semibold color-main" href="#">{{$user->where('id',$post->user_id)->value('name')}}</a>
                            </div>
                        </div>

                        <div class="col-1 d-flex align-items-center">
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
                    <div class="p">
                        <a href="{{url('therapist/peer_chat/post/'.$post->id)}}">
                            <h4>{{$post->title}}</h4>
                        </a>
                    </div>
                    @if ($post->image_url)
                        <div>
                            <a href="{{url('therapist/peer_chat/post/'.$post->id)}}">
                                <img class="rounded" src="{{asset('Post_Pics/'.$post->image_url)}}">
                            </a>
                        </div>
                    @endif

                    <div class="py-2">
                        <p class="caption cursor-pointer text-truncate">
                            {{$post->caption}}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex">
                            <div>
                                <span class="post-id d-none">{{$post->id}}</span>
                                <button class="like-btn btn btn-hover-none p-1 fs-5 " type="button">
                                    <i class="like-btn-icon fas fa-heart me-1 color-main"></i>
                                    <span class="like-count color-main">{{$post->likes_count}}</span>
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-hover-none p-1 color-second fs-5" type="button">
                                    <i class="fas fa-comment me-1"></i>
                                    <span>{{$comments->where('post_id',$post->id)->count()}}</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <span class="fw-bold">{{$post->created_at->format('d M Y')}} at {{$post->created_at->format('H:i')}}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <h1>No one has posted yet</h1>
                </div>
            @endforelse

        </div>
    </div>
    @include('components.therapist.footer')
    <script src="{{asset('therapist/js/posts.js')}}">
    </script>
</body>

</html>
