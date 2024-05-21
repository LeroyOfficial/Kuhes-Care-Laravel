<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Book List';
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
            <h4 class="color-second">Manage Your Books</h4>
        </div>
        <div>

        </div>
    </div>
    <div class="d-flex justify-content-between px-2 p-1 mb-2">
        <div class=""></div>
        <div>
            <form class="d-flex" action="{{url('therapist/search_books')}}" method="get">
                <input class="form-control rounded-pill vw-30" type="search" name="search_books" placeholder="Search Books" required="">
                    <button class="btn" type="submit">
                    <i class="fas fa-search fs-4"></i>
                </button>
            </form>
        </div>
        <div class="">
            <a href="{{url('therapist/new_book')}}" role="button" class="btn btn-bg-main">Add a New Book</a>
        </div>
    </div>
    <div class="row">
        @forelse ($books as $book)
            <div id="book-{{$book->id}}" class="col-md-6 col-lg-3 p-3">
                <div>
                    <a href="{{url('therapist/book/'.$book->id)}}">
                    <img src="{{asset('Book_Pics/'.$book->image_url)}}">
                </a>
                    <div>
                        <div class="text-end">
                            <span class="fw-bold">
                            <span class="me-1">{{$book->read_count}}</span>
                            <span>reads</span>
                        </span>
                        </div>
                        <div>
                            <a class="color-main fw-semibold fs-4" href="{{url('therapist/book/'.$book->id)}}">{{$book->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <h4>You havent published any books yet</h4>
                <h5>click on add new book button</h5>
            </div>
        @endforelse
    </div>
    @include('components.therapist.footer')
    <script src="{{asset('assets/js/bookList.js')}}"></script>
</body>

</html>
