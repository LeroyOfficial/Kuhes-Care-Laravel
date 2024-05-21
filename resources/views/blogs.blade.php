<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Blog';
    @endphp
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')

    <div id="page-header" class="page-header justify-content-center text-center">
        <div class="top-div mb-5">
            <span class="subheader">PSYCHOTHERAPISTS ONLINE</span>
            <h1 class="heading">
                <span class="me-3">Read Our Today's
                    <br>
                    Essential
                </span>
                <span class="underlined">Reads</span>
            </h1>
        </div>
    </div>

    <div class="section">
        <div class="d-block d-md-flex flex-row-reverse">
            <div id="blog-menu" class="col-md-3 px-2">
                <div class="mb-2 mb-md-5">
                    <form method="get" action="{{url('search_blogs')}}">
                        @csrf
                        <div class="d-flex">
                            <input class="form-control rounded-pill me-3" type="search" name="search" placeholder="Looking for" required="">
                            <button class="btn btn-link rounded-circle bg-second p-2" type="submit">
                                <i class="fas fa-search text-white"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div id="category-sm-list" class="d-block d-md-none py-2">
                    <select class="w-100">
                        <option value="12" selected="">Select Category</option>
                        @forelse($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @empty
                            <option value="13">No Categories Available</option>
                        @endforelse
                    </select>
                </div>
                <div id="recent-blogs-div" class="mb-5 d-none d-md-block">
                    <h3 class="mb-4">Recent Posts</h3>
                    <div id="recent-blog-list">
                        @forelse ($recent_blogs as $blogs)
                            <div id="recent-blog-1" class="recent-blog row align-items-center mb-2 pb-2 border-bottom">
                                <div class="col-4 h-100 p-0">
                                    <a href="{{url('read_blog/'.$blog->id)}}">
                                    <img class="rounded" src="{{asset('Blog_Pics/'.$blog->image_url)}}">
                                </a>
                                </div>
                                <div class="col-8 p-0 ps-2">
                                    <span class="date fw-bold">{{$blog->createdAt->format('d M Y')}}</span>
                                    <a class="mb-4" href="{{url('read_blog/'.$blog->id)}}">
                                        <h5>{{$blog->title}}</h5>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <h4>no other blogs available</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div id="category-list" class="d-none d-md-block">
                    <h3 class="mb-4">Categories</h3>
                    <ul class="list-unstyled">
                        @forelse ($categories as $category)
                            <li class="pb-2 mb-2 border-bottom">
                                <a href="{{url('blog_category/'.$category->name)}}">{{$category->name}}</a>
                            </li>
                        @empty
                            <li>no categories available</li>
                        @endforelse

                    </ul>
                </div>
            </div>
            <div id="blog-list" class="col-md-9 px-2">
                @forelse ($blogs as $blog)
                    <div id="blog-{{$blog->id}}" class="mb-5 blog-div row align-items-center">
                        <div class="col-6">
                            <img class="rounded" src="{{asset('Blog_Pics/'.$blog->image_url)}}">
                        </div>
                        <div class="col-6 py-3">
                            <a class="fs-6 text-uppercase fw-bold mb-4" href="#">{{$blog->category}}</a>
                            <a class="mb-4" href="{{url('read_blog/'.$blog->id)}}">
                                <h1>{{$blog->title}}</h1>
                            </a>
                            <p class="mt-4">
                                <span class="me-2">{{$blog->createdAt->format('d M Y')}}</span>
                                <span class="me-2">/</span>
                                <a class="fw-bold me-2" href="#">Leroy</a>
                                <span class="me-2">/</span>
                                <i class="far fa-comment-dots me-2"></i>
                                <span class="me-2 color-second">{{$comments->where('blog_id',$blog->id)->count()}}</span>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <h1>No Blogs Available yet</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    @include('components.user.footer')
</body>

</html>
