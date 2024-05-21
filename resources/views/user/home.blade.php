<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'User Dashboard';
    @endphp
    @include('components.user.css')
</head>

<body>
    <div id="top-bar" class="p-2 p-md-4 vh-10 d-flex align-items-center justify-content-between">
        <div>
            <a class="d-flex align-items-center" href="{{url('user/dashboard')}}">
            <img id="logo" class="logo" src="{{asset('assets/img/logo.png')}}">
                <h2 class="d-none d-md-flex">
                    <span class="k">Kuhes</span>
                    <span class="c">Care</span>
                </h2>
            </a>
        </div>
        <div class="dropdown">
            <button class="btn dropdown-toggle color-main btn-hover-none" aria-expanded="false" data-bs-toggle="dropdown" type="button">
            <img class="rounded-circle me-2" src="{{asset('assets/img/hero_image_04.png')}}" style="width: 50px;">
            <span class="fw-bold">{{Auth::user()->name}}</span>
        </button>
            <div class="dropdown-menu">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                    <span class="me-2">Account Settings</span>
                    <i class="far fa-user color-second"></i>
                </a>

                <form id="logout-form" hidden="" method="POST" action="{{route('logout')}}">
                    @csrf
                </form>

                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="me-2">Logout</span>
                    <i class="fas fa-sign-out-alt color-second"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="overflow-auto bg-grey border-second border-top border-2">
        <div class="text-center p-2 mb-4">
            @if($birthday->isToday())
                <h1>Happy Birthday {{$client->first_name}}</h1>
                <h2>We wish you all the best in life</h2>
            @else
                <h1>Welcome {{$client->first_name}}</h1>
            @endif
            <h4>How can we help you today</h4>
        </div>
        <div class="row row-cols-md-2 row-cols-lg-4 p-2 justify-content-between text-center">
            <div class="p-2">
                <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                    <div class="text-center mb-3">
                        <a href="{{url('user/therapists')}}">
                            <img class="vh-30" src="{{asset('assets/img/34986924.jpg')}}">
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="{{url('user/therapists')}}">
                            <h4>Talk to a Therapist</h4>
                        </a>
                    </div>
                    <p>This is where you can talk to a therapist through text, audio and video chat</p>
                </div>
            </div>
            <div class="p-2">
                <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                    <div class="text-center mb-3">
                        <a href="{{url('user/peer_chat')}}">
                            <img class="vh-30" src="{{asset('assets/img/40079084.jpg')}}">
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="{{url('user/peer_chat')}}">
                            <h4>Peer Chat</h4>
                            <p>This is where you can interact other members to see motivate each other</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                    <div class="text-center mb-3">
                        <a href="{{url('user/books')}}">
                            <img class="vh-30" src="{{asset('assets/img/43533634.jpg')}}">
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="{{url('user/books')}}">
                            <h4>Read Books</h4>
                            <p>This is where you can read motivational books just like on Wikipedia</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                    <div class="text-center mb-3">
                        <a href="{{url('user/videos')}}">
                            <img class="vh-30" src="{{asset('assets/img/34348882.jpg')}}">
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="{{url('user/videos')}}">
                            <h4>Watch Videos</h4>
                            <p>This is where you can watch motivational videos just like on YouTube</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                    <div class="text-center mb-3">
                        <i class="fas fa-user-cog fs-1 color-second"></i>
                    </div>
                    <div class="text-center">
                        <a href="{{url('user/#')}}">
                            <h4>Manage Profile</h4>
                            <p>This is where you can manage your details</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                    <div class="text-center mb-3">
                        <a href="{{url('user/appointments')}}">
                            <img class="vh-30" src="{{asset('assets/img/41236413.jpg')}}">
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="{{url('user/appointments')}}">
                            <h4>Appointments</h4>
                            <p>This is where you can book appointments</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                    <div class="text-center mb-3">
                        <a href="{{url('user/progress')}}">
                            <img class="vh-30" src="{{asset('assets/img/21162870.jpg')}}">
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="{{url('user/progress')}}">
                            <h4>Check your Progress</h4>
                            <p>This is where you can check your progress to see how well you have improved.. and you can also generate reports</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="bg-white p-4 rounded-3 border-1 shadow-sm">
                    <div class="text-center mb-3">
                        <i class="fas fa-sign-out-alt fs-1 color-second"></i>
                    </div>
                    <div class="text-center">
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <h4>Logout</h4>
                            <p>Logout of your account</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="vh-10 bg-main text-center p-1">
        <span class="text-white me-1 fw-semibold fs-4">Kuhes</span>
        <span class="color-second fw-semibold fs-4 me-2">Care</span>
        <span class="me-1">@ 2024 developed by</span>
        <a class="fw-bold color-second fs-5" href="https://linktr.ee/leroy_official.mw" target="_blank">Leroy</a>
    </footer>
    @include('components.user.auth.footer')
</body>

</html>
