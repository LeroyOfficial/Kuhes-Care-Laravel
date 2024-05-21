<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Publish A New Video';
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
            <h4 class="color-second">Publish A New Video</h4>
        </div>
        <div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 pt-5">
            <form action="{{url('therapist/post_new_video')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 mb-4 d-none text-center" id="video-preview-div">
                        <h6>Video</h6>
                        <video id="video-preview" style="max-width:100%; max-height:40vh;" controls></video>
                    </div>
                    <div class="col-12 mb-4 text-end">
                        <input type="file" name="video" id="video-input" accept="video/*" class="d-none" required>
                        <button id="add-video-btn" class="btn btn-hover-none" type="button">
                            <span class="me-1 text-dark">Select Video</span>
                            <i class="fas fa-paperclip attachment fs-3"></i>
                        </button>
                    </div>

                    <div class="col-12 mb-4 d-none text-center" id="thumbnail-preview-div">
                        <h6>Thumbnail</h6>
                        <img src="" alt="" id="thumbnail-preview" class="rounded">
                    </div>
                    <div id="add-thumbnail-div" class="col-12 mb-4 d-none text-end">
                        <input type="file" name="video_thumbnail" id="thumbnail-input" class="d-none" accept="image/*" required>
                        <button id="add-thumbnail-btn" class="btn btn-hover-none" type="button">
                            <span class="me-1 text-dark">Select Custom Thumbnail</span>
                            <i class="fas fa-paperclip attachment fs-3"></i>
                        </button>
                        <div class="text-end">
                            {{-- <span style="font-size: 12px;" class="me-1 text-dark">optional(which means you can leave it blank and a thumbnail for the video will be generated automatically)</span> --}}
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="video_title" class="form-control">
                    </div>
                    <div class="col-12 mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="video_description" id="description" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-bg-main">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    @include('components.therapist.footer')
    <script src="{{asset('therapist/js/new_video.js')}}"></script>
</body>

</html>
