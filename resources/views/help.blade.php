<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Help';
    @endphp
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')

    <div id="page-header" class="page-header justify-content-center text-center">
        <div class="top-div mb-5">
            <span class="subheader">
            <br>Help Us</span>
            <h1 class="heading mb-4">
                <span class="me-3">Here is how</span>
                <span class="underlined">to use this Platform</span>
            </h1>
        </div>
    </div>

    <div class="section bg-grey">
        <div class="col-6 col-md-3 col-lg-2">
            <div class="bg-white p-4 rounded-4">
                <i class="fas fa-money-check-alt mb-3"></i>
                <h2 class="text-capitalize">It's Affordable</h2>
                <p>Starting from €45, we have introduced a new 30 minute Covid19 mental health check</p>
            </div>
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

    <div class="section">
        <div class="row">
            <div class="col-md-6">
                <span class="subheader">Text</span>
                <h1 class="heading mb-4">
                    <span class="me-3">Reach Out and Talk to Us</span>
                    <span class="underlined">Today</span>
                </h1>
                <a class="btn btn-bg-main btn-lg" role="button">Take the first step</a>
            </div>
            <div class="col-md-6">
                <div class="faq-question-div mb-4">
                    <h4 class="cursor-pointer">What Is Online Counselling?</h4>
                    <p>Online Counselling Sessions are with our psychologists and psychotherapists available by phone or video through our patient management system or an internet-based application called Zoom. We schedule a meeting with you through our relationship team and send you a link, with your therapist at the time arranged.</p>
                </div>
                <div class="faq-question-div mb-4">
                    <h4 class="cursor-pointer">Can I Use Online Therapy From Anywhere?</h4>
                    <p class="d-none">Online Counselling Sessions are with our psychologists and psychotherapists available by phone or video through our patient management system or an internet-based application called Zoom. We schedule a meeting with you through our relationship team and send you a link, with your therapist at the time arranged.</p>
                </div>
                <div class="faq-question-div mb-4">
                    <h4 class="cursor-pointer">Which Type of Therapy Will Suit Me?</h4>
                    <p class="d-none">Online Counselling Sessions are with our psychologists and psychotherapists available by phone or video through our patient management system or an internet-based application called Zoom. We schedule a meeting with you through our relationship team and send you a link, with your therapist at the time arranged.</p>
                </div>
                <div class="faq-question-div mb-4">
                    <h4 class="cursor-pointer">How Do I Choose a Therapist?</h4>
                    <p class="d-none">Online Counselling Sessions are with our psychologists and psychotherapists available by phone or video through our patient management system or an internet-based application called Zoom. We schedule a meeting with you through our relationship team and send you a link, with your therapist at the time arranged.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-grey">
        <div class="text-center">
            <span class="subheader">SERVICES</span>
            <h1 class="mt-4 mb-5">What We Can Do Together</h1>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="therapy-type rounded-5">
                    <div>
                        <img class="rounded-5 rounded-bottom" src="{{asset('assets/img/featured_image_blog.jpg')}}">
                    </div>
                    <div class="bg-white p-4 py-5 rounded-top rounded-5">
                        <span class="color-second fw-bold">ONLINE &amp; IN PERSON</span>
                        <h3>Individual Couples</h3>
                        <p class="mb-4">All of us want to feel loved and when we feel disconnected or stuck in a it colors services our when we entire lookout</p>
                        <a class="text-capitalize fw-bold" href="#">view more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="therapy-type rounded-5">
                    <div>
                        <img class="rounded-5 rounded-bottom" src="{{asset('assets/img/featured_image_blog.jpg')}}">
                    </div>
                    <div class="bg-white p-4 py-5 rounded-top rounded-5">
                        <span class="color-second fw-bold">ONLINE &amp; IN PERSON</span>
                        <h3>Individual Couples</h3>
                        <p class="mb-4">All of us want to feel loved and when we feel disconnected or stuck in a it colors services our when we entire lookout</p>
                        <a class="text-capitalize fw-bold" href="#">view more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="therapy-type rounded-5">
                    <div>
                        <img class="rounded-5 rounded-bottom" src="{{asset('assets/img/featured_image_blog.jpg')}}">
                    </div>
                    <div class="bg-white p-4 py-5 rounded-top rounded-5">
                        <span class="color-second fw-bold">ONLINE &amp; IN PERSON</span>
                        <h3>Individual Couples</h3>
                        <p class="mb-4">All of us want to feel loved and when we feel disconnected or stuck in a it colors services our when we entire lookout</p>
                        <a class="text-capitalize fw-bold" href="#">view more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-4">
            <button class="btn btn-bg-main btn-lg" type="button">More Services</button>
        </div>
    </div>

    <div class="section">
        <div class="row">
            <div class="col-md-6 px-2">
                <span class="subheader">JOIN OUR COMUNITY</span>
                <h1 class="heading mb-4">
                    <span class="me-3">Together We Can Make Great</span>
                    <span class="underlined">Progress</span>
                </h1>
                <p>Join over 10.000 others on Lycka email list to get access to excluseive for our customers as part of the list you content and deals.</p>
                <div>
                    <form>
                        <div class="row">
                            <div class="col-9">
                                <input class="form-control rounded-pill" type="email" name="newsletter_email" placeholder="Email Address">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-bg-main rounded-pill" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('assets/img/hero_image_04.png')}}">
            </div>
        </div>
    </div>

    <div class="bg-second p-3 d-flex justify-content-center">
        <div class="d-flex">
            <h1 class="me-3">Ready to Talk?</h1>
            <a class="btn btn-bg-main rounded-pill btn-lg" role="button" href="contact.html">
                <span class="me-2">Get in Touch</span>
                <i class="fas fa-phone-alt fs-5 color-second"></i>
            </a>
        </div>
    </div>

    @include('components.user.footer')
</body>

</html>
