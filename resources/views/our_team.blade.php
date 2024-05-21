<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Our Team';
    @endphp
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')

    <div id="page-header" class="page-header justify-content-center text-center">
        <div class="top-div mb-5">
            <span class="subheader">
            <br>ABOUT US</span>
            <h1 class="heading mb-4">
                <span class="me-3">The Best Kuhes Team Live</span>
                <span class="underlined">in Town</span>
            </h1>
            <a class="btn btn-bg-main btn-lg rounded-pill" role="button" href="{{url('/contact')}}">contact us<i class="fas fa-phone-alt ms-2"></i>
            </a>
        </div>
    </div>
    <div class="section bg-white">
        <div class="text-center">
            <span class="subheader">OUR TEAM</span>
            <h1 class="mt-4 mb-5">Meet Our Therapists</h1>
        </div>
        <div id="therapist-list" class="row justify-content-center">
            <div id="therapist-1" class="col-md-6 col-lg-4">
                <div class="therapist-card rounded-5 p-4 d-flex flex-column justify-content-end">
                    <div>
                        <h2>Leroy</h2>
                        <h5 class="pb-3 mb-3 border-main">Therapist</h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="far fa-star"></i>
                            </div>
                            <div>
                                <a class="text-capitalize" href="therapist.html">view profile<i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="therapist-2" class="col-md-6 col-lg-4">
                <div class="therapist-card rounded-5 p-4 d-flex flex-column justify-content-end">
                    <div>
                        <h2>Leroy</h2>
                        <h5 class="pb-3 mb-3 border-main">Therapist</h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="far fa-star"></i>
                            </div>
                            <div>
                                <a class="text-capitalize" href="therapist.html">view profile<i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="therapist-3" class="col-md-6 col-lg-4">
                <div class="therapist-card rounded-5 p-4 d-flex flex-column justify-content-end">
                    <div>
                        <h2>Leroy</h2>
                        <h5 class="pb-3 mb-3 border-main">Therapist</h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="far fa-star"></i>
                            </div>
                            <div>
                                <a class="text-capitalize" href="therapist.html">view profile<i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.user.footer')

</body>

</html>
