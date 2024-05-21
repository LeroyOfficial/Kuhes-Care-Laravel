<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Articles';
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
            <h4 class="color-second">Read Articles</h4>
        </div>
        <div>

        </div>
    </div>
    <div class="d-flex justify-content-center px-2 p-1 mb-2">
        <div>
            <form class="d-flex" action="{{url('user/search_books')}}" method="get">
                <input class="form-control rounded-pill vw-30" type="search" name="search_books" placeholder="Search Books" required="">
                <button class="btn" type="submit">
                <i class="fas fa-search fs-4"></i>
            </button>
            </form>
        </div>
    </div>
    <div class="row">
        @forelse ($books as $book)
            <div id="book-1" class="col-md-6 col-lg-3 p-3">
                <div>
                    <a href="{{url('user/read_book/'.$book->id)}}">
                    <img src="{{asset('Book_Pics/'.$book->image_url)}}">
                </a>
                    <div>
                        <div class="d-flex justify-content-between">
                            <a class="color-second fw-semibold" href="{{url('user/therapist/'.$book->therapist_id)}}">
                                Therapist -
                                {{$therapist->where('id',$book->therapist_id)->value('first_name')}}
                                {{$therapist->where('id',$book->therapist_id)->value('last_name')}}
                            </a>
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
            <div class="text-center">
                <h1>No Books Available</h1>
            </div>
        @endforelse
    </div>
    @include('components.user.auth.footer')
    <script src="{{asset('assets/js/bookList.js')}}"></script>
</body>

</html>
