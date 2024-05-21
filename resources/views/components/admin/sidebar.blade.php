<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a class="d-flex align-items-center" href="{{url('admin/dashboard')}}">
                        <img id="logo" class="fs-1" src="{{asset('assets/img/logo.png')}}">
                            <h2 class="d-none d-md-flex">
                                <span class="color-main me-1">Kuhes</span>
                                <span class="color-second">Care</span>
                            </h2>
                        </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item @if ($page_title == 'Dashboard') active @endif">
                    <a href="{{url('admin/dashboard')}}" class='sidebar-link'>
                        <i class="fas fa-chart-bar"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item @if ($page_title == 'Clients' || $page_title =='Client') active @endif">
                    <a href="{{url('admin/clients')}}" class='sidebar-link'>
                        <i class="iconly-boldProfile"></i>
                        <span>Clients</span>
                    </a>
                </li>

                <li class="sidebar-item @if ($page_title == 'Therapists' || $page_title =='Therapist' || $page_title =='Add New Therapist') active @endif">
                    <a href="{{url('admin/therapists')}}" class='sidebar-link'>
                        <i class="iconly-boldAdd-User"></i>
                        <span>Therapists</span>
                    </a>
                </li>

                <li class="sidebar-item @if ($page_title == 'Peer Posts' || $page_title =='Peer Post') active @endif">
                    <a href="{{url('admin/peer_posts')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Peer Posts</span>
                    </a>
                </li>

                <li class="sidebar-item @if ($page_title == 'Payments' || $page_title =='Payment') active @endif">
                    <a href="{{url('admin/payments')}}" class='sidebar-link'>
                        <i class="fas fa-dollar-sign"></i>
                        <span>Payments</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a role="button" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class='sidebar-link'>
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" hidden="" method="POST" action="{{route('logout')}}">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>
