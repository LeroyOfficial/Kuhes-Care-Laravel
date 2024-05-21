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
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="list-inline-item px-2">
                    <a href="{{url('/about')}}">About</a>
                </li>
                <li class="list-inline-item px-2">
                    <a href="{{url('/blogs')}}">Blog</a>
                </li>
                <li class="list-inline-item px-2">
                    <a href="{{url('/our_team')}}">Our Team</a>
                </li>
                <li class="list-inline-item px-2">
                    <a href="{{url('/#')}}">Shop</a>
                </li>
                <li class="list-inline-item px-2">
                    <a class="btn login btn-bg-main" role="button" href="{{url('/login')}}">Login</a>
                </li>
                <li class="list-inline-item px-2">
                    <a class="btn signup btn-bg-second" role="button" href="{{url('/register')}}">Register</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center justify-content-center d-lg-none col-2">
            <div class="dropdown">
                <button class="btn" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                <i class="fas fa-list-ul color-main fs-4"></i>
            </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item btn-hover-main" href="{{url('/#')}}">First Item</a>
                    <a class="dropdown-item btn-hover-main" href="{{url('/#')}}">Second Item</a>
                    <a class="dropdown-item btn-hover-main" href="{{url('/#')}}">Third Item</a>
                </div>
            </div>
        </div>
    </div>
</nav>
