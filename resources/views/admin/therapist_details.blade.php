<!DOCTYPE html>
<html lang="en">

<?php
    $page_title = 'Therapist';
?>

<head>
    @include('components.admin.css')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
</head>

<body>
    <div id="app">
        @include('components.admin.sidebar')

        <div id="main">
            @include('components.admin.header')

            <div class="page-heading">
                <h3>Therapist Details</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>{{$therapist->first_name}} {{$therapist->last_name}} Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-5">
                                            <div class="col-12 col-lg-3">
                                                <img src="{{asset('Therapist_Pics/'.$therapist->image_url)}}" alt="{{$therapist->first_name}}'s picture" class="rounded-circle-v">
                                            </div>
                                            <div class="col-12 col-lg-7">
                                                <div class="row row-cols-md-2">
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Name</p>
                                                        <p class="m-0">{{$therapist->first_name}} {{$therapist->last_name}}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Gender</p>
                                                        <p class="m-0">{{$therapist->gender}}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Phone Number</p>
                                                        <p class="m-0">{{$therapist->phone_number}}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Email</p>
                                                        <p class="m-0">{{$therapist->email}}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Specialist</p>
                                                        <p class="m-0">{{$therapist->qualification}}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Experience</p>
                                                        <p class="m-0">{{$therapist->experience}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-5">
                                                <p class="fw-bold m-0">About</p>
                                                <p class="m-0">{{$therapist->about}}</p>
                                            </div>
                                            
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="dropdown show text-capitalize">
                                                    <button class="btn dropdown-toggle btn-bg-main text-white fs4 py-2 px-4" aria-expanded="true" data-bs-toggle="dropdown" type="button">Generate Report</button>
                                                    <div class="dropdown-menu ms-3" data-bs-popper="none">
                                                        <a class="dropdown-item fw-bold btn-hover-main" href="{{url('admin/generate_report/therapist/'.$therapist->id.'/today')}}">for Today</a>
                                                        <a class="dropdown-item fw-bold btn-hover-main" href="{{url('admin/generate_report/therapist/'.$therapist->id.'/weekly')}}">For this week</a>
                                                        <a class="dropdown-item fw-bold btn-hover-main" href="{{url('admin/generate_report/therapist/'.$therapist->id.'/monthly')}}">for this month</a>
                                                        <a class="dropdown-item fw-bold btn-hover-main" href="{{url('admin/generate_report/therapist/'.$therapist->id.'/all')}}">Entire History</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h2>Videos Posted</h2>
                                            <div class="row">
                                                @forelse ($videos as $video)
                                                    <div id="video-{{$video->id}}" class="col-md-6 col-lg-3 p-3">
                                                        <div>
                                                            <a href="{{url('user/watch_video/'.$video->id)}}">
                                                                <img src="{{asset('Video_Thumbnails/'.$video->thumbnail_url)}}">
                                                            </a>
                                                            <div>
                                                                <div class="text-end">
                                                                    <span class="fw-bold">
                                                                        <span class="me-1">{{$video->view_count}}</span>
                                                                        <span>views</span>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a class="color-main fw-semibold fs-4" href="{{url('user/watch_video/'.$video->id)}}">{{$video->title}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <h4>No Videos Published yet</h4>
                                                @endforelse
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h2>Books Published</h2>
                                            <div class="row">
                                                @forelse ($books as $book)
                                                    <div id="book-{{$book->id}}" class="col-md-6 col-lg-3 p-3">
                                                        <div>
                                                            <a href="{{url('admin/read_book/'.$book->id)}}">
                                                                <img style="max-height: 100%; max-width:100%;" src="{{asset('Book_Pics/'.$book->image_url)}}" alt="{{$book->title}}">
                                                            </a>
                                                            <div>
                                                                <div class="text-end">
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
                                                    <h4>No Books Published Yet</h4>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @include('components.admin.footer')
</body>

</html>
