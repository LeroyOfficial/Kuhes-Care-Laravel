<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Publish A New Book';
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
            <h4 class="color-second">Publish A New Book</h4>
        </div>
        <div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <form action="{{url('therapist/post_new_book')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 mb-4 text-center" id="img-preview-div">
                        <img src="" alt="" id="preview" class="rounded">
                    </div>
                    <div class="col-12 mb-4 text-end">
                        <input type="file" name="image" id="image-input" class="d-none" accept="image/*">
                        <button id="add-image-btn" class="btn btn-hover-none" type="button">
                            <span class="me-1 text-dark">Select Book Cover Picture</span>
                            <i class="fas fa-paperclip attachment fs-3"></i>
                        </button>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="book_title" id="" class="form-control">
                    </div>
                    <div class="col-12 mb-4">
                        <label for="details" class="form-label">Details</label>
                        <textarea name="book_details" id="details" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-bg-main">Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    @include('components.therapist.footer')
    <script src="{{asset('therapist/js/new_book.js')}}"></script>
</body>

</html>
