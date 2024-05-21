<nav class="w-100">
    <div class="row px-1 px-lg-4">
        <div class="col-10 col-lg-4">
            <a class="d-flex align-items-center" href="{{url('/')}}">
            <img id="logo" class="logo" src="{{asset('assets/img/logo.png')}}">
                <h1>
                    <span class="k">Kuhes</span>
                    <span class="c">Care</span>
                </h1>
            </a>
        </div>
        <div class="col-8 d-none d-lg-flex align-items-center justify-content-end">
            <ul class="list-inline">
                <li class="list-inline-item px-2">
                    <a href="{{url('/')}}" class="@if($page_title == 'Home') color-second fw-bold @endif">Home</a>
                </li>
                <li class="list-inline-item px-2">
                    <a href="{{url('/about')}}" class="@if($page_title == 'About us') color-second fw-bold @endif">About</a>
                </li>
                <li class="list-inline-item px-2">
                    <a href="{{url('/blogs')}}" class="@if($page_title == 'Blogs') color-second fw-bold @endif">Blog</a>
                </li>
                <li class="list-inline-item px-2">
                    <a href="{{url('/our_team')}}" class="@if($page_title == 'Our Team') color-second fw-bold @endif">Our Team</a>
                </li>
                <li class="list-inline-item px-2">
                    <a href="{{url('/help')}}" class="@if($page_title == 'Help') color-second fw-bold @endif">Help</a>
                </li>
                {{-- <li class="list-inline-item px-2">
                    <a href="{{url('/#')}}">Shop</a>
                </li> --}}
                @auth
                    <li class="list-inline-item px-2">
                        <a class="btn login btn-bg-main" role="button" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
                    </li>
                    <form id="logout-form" hidden="" method="POST" action="{{route('logout')}}">
                        @csrf
                    </form>
                @else
                    <li class="list-inline-item px-2">
                        <a class="btn login btn-bg-main" role="button" href="{{url('/login')}}">Login</a>
                    </li>
                    <li class="list-inline-item px-2">
                        <a class="btn signup btn-bg-second" role="button" href="{{url('/register')}}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
        <div class="d-flex align-items-center justify-content-center d-lg-none col-2">
            <div class="dropdown">
                <button class="btn" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                    <i class="fas fa-list-ul color-main fs-4"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item btn-hover-main" href="{{url('/home')}}">Home</a>
                    <a class="dropdown-item btn-hover-main" href="{{url('/about')}}">About</a>
                    <a class="dropdown-item btn-hover-main" href="{{url('/blogs')}}">Blog</a>
                    <a class="dropdown-item btn-hover-main" href="{{url('/our_team')}}">Our Team</a>

                    @auth
                        <a class="dropdown-item btn-hover-main" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
                    @else
                        <a class="dropdown-item btn-hover-main" href="{{url('/login')}}">Login</a>
                        <a class="dropdown-item btn-hover-main" href="{{url('/signup')}}">Signup</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
