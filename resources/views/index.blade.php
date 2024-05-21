<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Home';
    @endphp
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')
    <div id="hero" class="hero d-flex flex-column justify-content-center">
        <div class="top-div mb-5">
            <span class="subheader">Your Personal Therapist</span>
            <h1 class="heading">
                <span>helping you find&nbsp;</span>
                <span class="the">the&nbsp;
                    <span class="answers">Answers</span>
                </span>
            </h1>
        </div>
        <div class="lower-div row p-0">
            <div class="first-div col-md-4 px-3 py-4">
                <div class="mb-2">
                    <i class="fas fa-star"></i>
                    <span class="heading">Psychotherapy</span>
                </div>
                <p>Long Term Process that tnrg efej n ogrngjronw jo nroej&nbsp; ngjorng oj nrog je jo&nbsp; njoe n nojr o njor ojn&nbsp; nojeojn noj enf ro njrognjo no rjng o njownjof norjngno n orjn or njgo gno</p>
            </div>
            <div class="col-md-4 px-3 py-4">
                <div class="mb-2">
                    <i class="fas fa-star"></i>
                    <span class="heading">Counselling</span>
                </div>
                <p>Long Term Process that tnrg efej n ogrngjronw jo nroej&nbsp; ngjorng oj nrog je jo&nbsp; njoe n nojr o njor ojn&nbsp; nojeojn noj enf ro njrognjo no rjng o njownjof norjngno n orjn or njgo gno</p>
            </div>
            <div class="bg-main last-div col-md-4 px-3 py-4">
                <div class="mb-2">
                    <i class="fas fa-star"></i>
                    <span class="heading">Book a session</span>
                </div>
                <p>Long Term Process that tnrg efej n ogrngjronw jo nroej&nbsp; ngjorng oj nrog je jo&nbsp; njoe n nojr o njor ojn&nbsp; nojeojn noj enf ro njrognjo no rjng o njownjof norjngno n orjn or njgo gno</p>
            </div>
        </div>
    </div>

    <div id="services" class="section bg-grey">
        <div class="row">
            <div class="col-md-6 py-4 py-md-0">
                <span class="subheader">
                <strong>SERVICES</strong>
            </span>
                <h1 class="heading">
                    <span>Here to Help You</span>
                    <span>
                    <br>Find a Path&nbsp;</span>
                    <span class="underlined">Forward</span>
                </h1>
                <div>
                    <h4>
                        <em>We believe that effective therapy is:</em>
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-star"></i>
                            <span>About finding a therapist you “click” with.</span>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-star"></i>
                            <span>About finding a therapist you “click” with.</span>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-star"></i>
                            <span>About finding a therapist you “click” with.</span>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-star"></i>
                            <span>About finding a therapist you “click” with.</span>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-bg-main rounded-pill" role="button">Book a Session</a>
            </div>
            <div class="col-md-6 py-4 py-md-0">
                <div class="row row-cols-1 row-cols-md-2">
                    <div id="service-1" class="px-0 px-md-2 py-2">
                        <div class="service-card bg-white">
                            <img src="{{asset('assets/img/home_slider_02_01.jpg')}}">
                            <div class="p-3">
                                <span class="color-second text-uppercase">thepray</span>
                                <h4 class="mt-2">Managing Stress &amp; Anxiety</h4>
                                <a href="#">Read more<i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="service-2" class="px-0 px-md-2 py-2">
                        <div class="service-card bg-main text-white">
                            <img src="{{asset('assets/img/home_slider_02_01.jpg')}}">
                            <div class="p-3">
                                <span class="color-second text-uppercase">counseling</span>
                                <h4 class="mt-2">Managing Stress &amp; Anxiety</h4>
                                <a href="#">Read more<i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="service-3" class="px-0 px-md-2 py-2">
                        <div class="service-card bg-main text-white">
                            <img src="{{asset('assets/img/home_slider_02_01.jpg')}}">
                            <div class="p-3">
                                <span class="color-second text-uppercase">therapy</span>
                                <h4 class="mt-2">Managing Stress &amp; Anxiety</h4>
                                <a href="#">Read more<i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="service-4" class="px-0 px-md-2 py-2">
                        <div class="service-card bg-white">
                            <img src="{{asset('assets/img/home_slider_02_01.jpg')}}">
                            <div class="p-3">
                                <span class="color-second text-uppercase">counseling</span>
                                <h4 class="mt-2">Managing Stress &amp; Anxiety</h4>
                                <a href="#">Read more<i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-main text-white">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('assets/img/illustration_01.png')}}" alt="img">
            </div>
            <div class="col-md-6">
                <span class="subheader">
                <strong>SERVICES</strong>
            </span>
                <h1 class="heading mt-4 mb-4">Psychotherapy</h1>
                <p class="mb-4">We often tend to people who want to experience more satisfaction, joy, resiliency in their lives. Other times people feel down, unexcited about life, and just want to stop feeling that way. General areas we address.</p>
                <div class="row row-cols-2 mb-4">
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span>Relationships</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span>Family Dynamics</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span>Sadness/Depression</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span>Anxiety</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span>Trauma</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span>Sex Therapy</span>
                </span>
                </div>
                <div>
                    <a class="btn btn-large btn-hover-white rounded-pill border-1 border-white me-4" role="button">k2000/month</a>
                    <a href="{{url('/home')}}" class="btn btn-light rounded-pill btn-large text-dark" role="button">Book a session</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="text-center mb-5">
            <span class="subheader">Therapy</span>
            <h1 class="mt-3">
                <span class="me-2">Therapy</span>
                <span class="underlined">Process</span>
            </h1>
        </div>
        <div class="row row-cols-sm-2 row-cols-md-4">
            <div class="d-flex flex-column text-center align-content-center">
                <div class="svg-div">
                    <svg id="Layer_1456" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                        <defs>
                            <style>.cls-1{fill:#479baf;opacity:0.7;}.cls-2{fill:#161919;}</style>
                        </defs>
                        <title>_</title>
                        <path class="cls-1" d="M69,86H65.15l-3.77-8.48a27.36,27.36,0,0,0,6.22-2.26Z">
                        </path>
                        <path class="cls-1" d="M41.52,62H30.95c-.21,0-.42-.08-.63-.06C31,57.5,34.45,54,38.65,54h20A22.61,22.61,0,0,1,41.52,62Z">
                        </path>
                        <g id="_Group_456" data-name="<Group>">
                            <g id="_Group_2456" data-name="<Group>">
                                <polygon class="cls-2" points="39.05 87.85 32.46 87.85 34.1 77.84 36.08 78.17 34.81 85.85 37.72 85.85 41.17 77.62 43.01 78.39 39.05 87.85">
                                </polygon>
                            </g>
                            <g id="_Group_3456" data-name="<Group>">
                                <polygon class="cls-2" points="70.61 87.84 63.9 87.84 60.11 78.38 61.97 77.63 65.25 85.84 68.36 85.84 67.04 74.27 69.02 74.05 70.61 87.84">
                                </polygon>
                            </g>
                            <g id="_Group_4456" data-name="<Group>">
                                <path class="cls-2" d="M30.91,62.06h-2a9.54,9.54,0,0,1,9.53-9.53H58.65v2H38.44A7.54,7.54,0,0,0,30.91,62.06Z">
                                </path>
                            </g>
                        </g>
                        <polygon class="cls-1" points="37.98 86 34.89 86 36.07 79 40.98 79 37.98 86">
                        </polygon>
                        <path class="cls-2" d="M56.12,79H31.55a9.05,9.05,0,1,1,0-18.11H41A21.83,21.83,0,0,0,62.81,39.09V33.47A11.18,11.18,0,0,1,55.67,23q0-.42,0-.84a11,11,0,0,1,11.13-10h3.34a7.34,7.34,0,0,1,7.33,7.34V57.61A21.41,21.41,0,0,1,56.12,79ZM31.55,62.9a7.05,7.05,0,1,0,0,14.11H56.12A19.41,19.41,0,0,0,75.51,57.61V19.49a5.34,5.34,0,0,0-5.34-5.34H66.83a9,9,0,0,0-9.14,8.14q0,.34,0,.69a9.19,9.19,0,0,0,5.15,8.3V22.93h2l0,16.16A23.83,23.83,0,0,1,41,62.9Z">
                        </path>
                    </svg>
                </div>
                        <h6 class="color-second text-uppercase">Phase 1</h6>
                        <h3>Orientation</h3>
                        <p>Beginning to build a relationship will your therapist do wonders</p>
                    </div>
                    <div class="d-flex flex-column text-center align-content-center">
                        <div class="svg-div">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                <defs>
                                    <style>.cls-1{fill:#479baf;opacity:0.7;}.cls-2{fill:#161919;}</style>
                                </defs>
                                <title>_</title>
                                <path id="_Path_" data-name="<Path>" class="cls-1" d="M45.7,44.57a23,23,0,0,0,3.38-.25c1.76,2.84,4.82,6,9.81,6a.95.95,0,0,0,.63-1.65c-.1-.09-2.4-2.23-2.58-7.1,4.9-3,7.8-7.7,7.8-12.74,0-8.71-8.54-15.79-19-15.79s-19,7.08-19,15.79S35.2,44.57,45.7,44.57Z">
                                </path>
                                <g id="_Group_" data-name="<Group>">
                                    <path id="_Compound_Path_" data-name="<Compound Path>" class="cls-2" d="M81.68,60.14a8.5,8.5,0,0,0,4.07-7.25V48.65a8.51,8.51,0,0,0-8.51-8.5h-.66a8.51,8.51,0,0,0-8.5,8.5v4.23A8.5,8.5,0,0,0,71.89,60,14,14,0,0,0,61.76,73.44V79.3H53.69a4.3,4.3,0,0,0-3.61,6.64H45.23V76a11.55,11.55,0,0,0-7.54-10.82,7.07,7.07,0,0,0,3.06-5.82V55.94a7.08,7.08,0,0,0-7.07-7.07h-.54a7.08,7.08,0,0,0-7.07,7.07v3.43a7.07,7.07,0,0,0,3.16,5.89A11.55,11.55,0,0,0,21.88,76v9.93H15.65a1,1,0,0,0,0,2H66.4A3.86,3.86,0,0,0,70.26,84V71.86a1,1,0,0,0-2,0V84a1.9,1.9,0,0,1-1.89,1.89H53.69a2.34,2.34,0,0,1,0-4.67h9.05a1,1,0,0,0,1-1V73.44A12.07,12.07,0,0,1,75.78,61.39h1.48A12.07,12.07,0,0,1,89.31,73.44V86.92a1,1,0,0,0,2,0V73.44A14,14,0,0,0,81.68,60.14ZM33.15,64.47A5.11,5.11,0,0,1,28,59.37V55.94a5.11,5.11,0,0,1,5.11-5.11h.54a5.11,5.11,0,0,1,5.1,5.11v3.43a5.11,5.11,0,0,1-5.1,5.11ZM23.84,76a9.58,9.58,0,0,1,9.57-9.57h.28A9.58,9.58,0,0,1,43.27,76v9.93H23.84ZM76.58,59.42A6.54,6.54,0,0,1,70,52.89V48.65a6.54,6.54,0,0,1,6.54-6.54h.66a6.55,6.55,0,0,1,6.54,6.54v4.23a6.55,6.55,0,0,1-6.54,6.54Z">
                                    </path>
                                    <path id="_Compound_Path_2" data-name="<Compound Path>" class="cls-2" d="M46,44.91a23.89,23.89,0,0,0,3.52-.26c1.82,3,5,6.19,10.2,6.19a1,1,0,0,0,.66-1.71c-.1-.09-2.49-2.32-2.69-7.37,5.09-3.09,8.11-8,8.11-13.24,0-9-8.88-16.41-19.79-16.41S26.18,19.46,26.18,28.5,35.06,44.91,46,44.91Zm0-30.85c9.83,0,17.82,6.48,17.82,14.44,0,4.7-2.85,9.12-7.63,11.83a1,1,0,0,0-.5.86,14.77,14.77,0,0,0,1.86,7.43,10.84,10.84,0,0,1-6.68-5.54,1,1,0,0,0-.85-.5l-.17,0a21.69,21.69,0,0,1-3.85.35c-9.83,0-17.82-6.48-17.82-14.44S36.14,14.06,46,14.06Z">
                                    </path>
                                    <path id="_Path_2" data-name="<Path>" class="cls-2" d="M36.84,29.25a1,1,0,0,0,1-1v-3a1,1,0,0,0-2,0v3A1,1,0,0,0,36.84,29.25Z">
                                    </path>
                                    <path id="_Path_3" data-name="<Path>" class="cls-2" d="M46,29.25a1,1,0,0,0,1-1v-3a1,1,0,0,0-2,0v3A1,1,0,0,0,46,29.25Z">
                                    </path>
                                    <path id="_Path_4" data-name="<Path>" class="cls-2" d="M55.1,29.25a1,1,0,0,0,1-1v-3a1,1,0,0,0-2,0v3A1,1,0,0,0,55.1,29.25Z">
                                    </path>
                                </g>
                             </svg>
                        </div>
                        <h6 class="color-second text-uppercase">Phase 2</h6>
                        <h3>Identification</h3>
                        <p>Deciding next job exactly what you want to work on life balance.</p>
                    </div>
                    <div class="d-flex flex-column text-center align-content-center">
                        <div class="svg-div">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                <defs>
                                    <style>.cls-1{fill:#479baf;opacity:0.7;}.cls-2{fill:#161919;}</style>
                                </defs>
                                <title>_</title>
                                <circle id="_Path_" data-name="<Path>" class="cls-1" cx="54.17" cy="47.37" r="16.37">
                                </circle>
                                <g id="_Group_" data-name="<Group>">
                                    <path id="_Path_2" data-name="<Path>" class="cls-2" d="M53.5,12.33h-.58A29.87,29.87,0,0,0,23.09,42L16.84,62.08a3.94,3.94,0,0,0,3.76,5.11h4.67V77.43a6.3,6.3,0,0,0,6.8,6.28L41.36,83v3.64a1.06,1.06,0,0,0,2.11,0V81.83a1.06,1.06,0,0,0-.34-.78,1,1,0,0,0-.8-.28l-10.42.83a4.19,4.19,0,0,1-4.52-4.17V66.13a1.06,1.06,0,0,0-1.06-1.06H20.61a1.83,1.83,0,0,1-1.75-2.37l6.29-20.22a1,1,0,0,0,0-.31A27.76,27.76,0,0,1,52.92,14.44h.58A27.76,27.76,0,0,1,81.23,42.17V52.92a65.58,65.58,0,0,1-5.09,25.4l-1.3,3.1a1.06,1.06,0,0,0-.08.41v4.78a1.06,1.06,0,1,0,2.11,0V82l1.22-2.91a67.72,67.72,0,0,0,5.25-26.21V42.17A29.87,29.87,0,0,0,53.5,12.33Z">
                                    </path>
                                    <path id="_Path_3" data-name="<Path>" class="cls-2" d="M60.53,55.1a1.06,1.06,0,0,0,1.5,0,11.59,11.59,0,1,0-16.39,0,1.06,1.06,0,1,0,1.5-1.5,9.47,9.47,0,1,1,13.4,0A1.06,1.06,0,0,0,60.53,55.1Z">
                                    </path>
                                    <path id="_Path_4" data-name="<Path>" class="cls-2" d="M76.66,45.85a1.06,1.06,0,0,0-1.06,1.06A21.77,21.77,0,1,1,53.83,25.14a1.06,1.06,0,0,0,0-2.11A23.88,23.88,0,1,0,77.72,46.91,1.06,1.06,0,0,0,76.66,45.85Z">
                                    </path>
                                    <path id="_Compound_Path_" data-name="<Compound Path>" class="cls-2" d="M53.83,55.41a1.06,1.06,0,0,0,1.06-1.06v-3.6a4,4,0,1,0-2.11,0v3.6A1.06,1.06,0,0,0,53.83,55.41ZM52,46.91a1.88,1.88,0,1,1,1.88,1.88A1.88,1.88,0,0,1,52,46.91Z">
                                    </path>
                                    <path id="_Path_5" data-name="<Path>" class="cls-2" d="M47.42,63.4a17.7,17.7,0,1,0-10-9.8,1.06,1.06,0,1,0,2-.8,15.68,15.68,0,1,1,8.79,8.63,1.06,1.06,0,1,0-.77,2Z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <h6 class="color-second text-uppercase">Phase 3</h6>
                        <h3>Exploration</h3>
                        <p>This is where you’re diving into the issues and working on yourself.</p>
                    </div>
                    <div class="d-flex flex-column text-center align-content-center">
                        <div class="svg-div">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                <defs>
                                    <style>.cls-1{fill:#479baf;opacity:0.7;}.cls-2{fill:#161919;}</style>
                                </defs>
                                <title>_</title>
                                <circle id="_Path_" data-name="<Path>" class="cls-1" cx="33.66" cy="27.4" r="7.73">
                                </circle>
                                <g id="_Group_" data-name="<Group>">
                                    <path id="_Compound_Path_" data-name="<Compound Path>" class="cls-2" d="M87.35,77.85h-8.3l-31.15,2a7.59,7.59,0,0,1-5-1.48L14.77,57.3a2.8,2.8,0,0,1,2.89-4.76l17.52,8.39A5.27,5.27,0,0,0,38.6,65l19.92,7a1,1,0,0,0,.67-1.89l-19.92-7a3.24,3.24,0,0,1,.19-6.17l.23-.06a3.23,3.23,0,0,1,.65-.07H54.91a35.56,35.56,0,0,1,12.56,2.29l11.93,4.5a1,1,0,0,0,.35.07h7.5a1,1,0,0,0,0-2H79.93L68.18,57.22A37.46,37.46,0,0,0,54.91,54.8H48.68L34.75,47.92c-3.69-1.42-6.09.12-7.21,1.59l-.2-.08c-4.81-2-7.5.16-8.58,1.42l-.24-.12a4.8,4.8,0,0,0-5,8.18L41.72,80a9.51,9.51,0,0,0,5.7,1.9l.61,0,31.09-2h8.23a1,1,0,0,0,0-2ZM33.95,49.75l10.21,5H40.34a5.25,5.25,0,0,0-.89.08c-1.21-.59-5.58-2.68-10-4.55C30.22,49.61,31.61,48.86,33.95,49.75Zm-7.35,1.53c3.84,1.56,8.1,3.54,10.47,4.67a5.23,5.23,0,0,0-1.68,2.39c0,.13-.08.26-.12.4l-14.63-7C21.52,50.92,23.35,50,26.59,51.29Z">
                                    </path>
                                    <path id="_Compound_Path_2" data-name="<Compound Path>" class="cls-2" d="M33.66,36.69a9.3,9.3,0,0,0,9.24-8.29h16v5.72a1,1,0,0,0,2,0V28.41h11V38.61a1,1,0,1,0,2,0V27.4a1,1,0,0,0-1-1h-30a9.29,9.29,0,1,0-9.24,10.29Zm0-16.57a7.28,7.28,0,1,1-7.28,7.28A7.29,7.29,0,0,1,33.66,20.12Z">
                                    </path>
                                </g>
                            </svg>
                    </div>
                <h6 class="color-second text-uppercase">Phase 4</h6>
                <h3>Resolution</h3>
                <p>A time to reflect on everything you have accomplished so far.</p>
            </div>
        </div>
    </div>

    <div class="section bg-grey">
        <div class="row">
            <div class="col-md-6">
                <span class="subheader">Therapy session</span>
                <h1 class="my-5">
                    <span class="me-2">Couple&nbsp;</span>
                    <span class="underlined">Therapy</span>
                </h1>
                <p class="mb-5">Your relationship with your loved one is the your most valuable asset. It affects your emotional, social, physical, and financial health. It also creates a model for your children of what love is supposed to look like</p>
                <div class="row row-cols-2 mb-5">
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span class="fw-bold">Emotional Intimacy</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span class="fw-bold">Separation and Divorce</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span class="fw-bold">Connection</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span class="fw-bold">Sex Therapy</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span class="fw-bold">Affairs and Infidelity</span>
                </span>
                    <span class="mb-2">
                    <i class="fas fa-star color-second me-2"></i>
                    <span class="fw-bold">Grief and Mourning</span>
                </span>
                </div>
                <div>
                    <a class="btn btn-large rounded-pill btn-hover-main color-main border-1 border-dark me-4" role="button">k2000/month</a>
                    <a class="btn btn-large rounded-pill btn-bg-main" role="button">Book a session</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{asset('assets/img/illustration_02.png')}}" alt="img">
            </div>
        </div>
    </div>

    @include('components.user.footer')
</body>

</html>
