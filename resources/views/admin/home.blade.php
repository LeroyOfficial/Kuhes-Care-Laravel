<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $page_title = 'Dashboard';
    @endphp
    @include('components.admin.css')
</head>

<body>
    <div id="app">
        @include('components.admin.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Admin Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Users</h6>
                                                <h6 class="font-extrabold mb-0">{{$clients->count()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Therapists</h6>
                                                <h6 class="font-extrabold mb-0">{{$therapists->count()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Chats</h6>
                                                <h6 class="font-extrabold mb-0">{{$chat_count}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Peer Posts</h6>
                                                <h6 class="font-extrabold mb-0">{{$peer_posts->count()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Latest Peer Posts</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Post</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($peer_posts as $post)
                                                        <tr>
                                                            <td class="col-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-md">
                                                                        @if ($client->where('id',$post->user_id)->value('gender') == 'male')
                                                                            <img src="{{asset('admin/assets/images/faces/4.jpg')}}">
                                                                        @else
                                                                            <img src="{{asset('admin/assets/images/faces/5.jpg')}}">
                                                                        @endif
                                                                    </div>
                                                                    <p class="font-bold ms-3 mb-0">{{$client->where('id',$post->user_id)->value('first_name')}} {{$client->where('id',$post->user_id)->value('last_name')}}</p>
                                                                </div>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class=" mb-0">{{$post->title}}</p>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td class="col-12">
                                                                <p class="font-bold">No Peer Posts Available</p>
                                                            </td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/2.jpg" alt="admin icon" class="vh-10 vw-10">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{Auth::user()->name}}</h5>
                                        <h6 class="text-muted mb-0">Admin</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Therapists</h4>
                            </div>
                            <div class="card-content pb-4">

                                @forelse ($therapist_three as $therapist)
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            @if ($therapist->gender == 'Male')
                                                <img src="assets/images/faces/4.jpg">
                                            @else
                                                <img src="assets/images/faces/5.jpg">
                                            @endif
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{$therapist->first_name}} {{$therapist->last_name}}</h5>
                                            <h6 class="text-muted mb-0">therapist</h6>
                                        </div>
                                    </div>
                                @empty
                                    <div class="recent-message px-4">
                                        <h6 class="">No Therapists Available</h6>
                                    </div>
                                @endforelse
                                <div class="px-4">
                                    <a href="{{url('admin/therapists')}}" role="button" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>
                                        See All Therapists
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @include('components.admin.footer')
</body>

</html>
