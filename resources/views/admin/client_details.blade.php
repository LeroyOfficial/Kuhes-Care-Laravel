<!DOCTYPE html>
<html lang="en">

<?php
    $page_title = 'Client';
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
                <h3>Client Details</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>{{$client->first_name}} {{$client->last_name}} Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-5">
                                            <div class="col-12 col-lg-3">
                                                @if ($client->gender == 'male')
                                                    <img class="rounded-circle" style="max-height: 100px; max-width:100px" alt="{{$client->first_name}}'s image" src="{{asset('admin/assets/images/faces/4.jpg')}}">
                                                @else
                                                    <img class="rounded-circle" style="max-height: 100px; max-width:100px" alt="{{$client->first_name}}'s image" src="{{asset('admin/assets/images/faces/5.jpg')}}">
                                                @endif
                                            </div>
                                            <div class="col-12 col-lg-7">
                                                <div class="row row-cols-md-2">
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Name</p>
                                                        <p class="m-0">{{$client->first_name}} {{$client->last_name}}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Gender</p>
                                                        <p class="m-0">{{$client->gender}}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Phone Number</p>
                                                        <p class="m-0">{{$client->phone_number}}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold m-0">Email</p>
                                                        <p class="m-0">{{$client->email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <div class="col-12 col-lg-9">
                                                <div class="d-flex justify-content-between">
                                                    <h6>{{$client->first_name}} {{$client->last_name}} Posts</h6>

                                                    <div class="dropdown show text-capitalize">
                                                        <button class="btn dropdown-toggle btn-bg-main text-white fs4 py-2 px-4" aria-expanded="true" data-bs-toggle="dropdown" type="button">Generate Report</button>
                                                        <div class="dropdown-menu ms-3" data-bs-popper="none">
                                                            <a class="dropdown-item fw-bold btn-hover-main" href="{{url('admin/generate_report/client/'.$client->id.'/today')}}">for Today</a>
                                                            <a class="dropdown-item fw-bold btn-hover-main" href="{{url('admin/generate_report/client/'.$client->id.'/weekly')}}">For this week</a>
                                                            <a class="dropdown-item fw-bold btn-hover-main" href="{{url('admin/generate_report/client/'.$client->id.'/monthly')}}">for this month</a>
                                                            <a class="dropdown-item fw-bold btn-hover-main" href="{{url('admin/generate_report/client/'.$client->id.'/all')}}">Entire History</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Caption</th>
                                                                <th></th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($posts as $post)
                                                                <tr>
                                                                    <td class="col-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <a href="{{url('admin/peer_post/'.$post->id)}}" class="font-bold ms-3 mb-0 text-truncate">
                                                                                {{$post->title}}
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-auto">
                                                                        <p class="mb-0 text-truncate">{{$post->caption}}</p>
                                                                    </td>
                                                                    <td class="col-auto">
                                                                        <td class="col-auto">
                                                                            <p class=" mb-0">{{$post->created_at->format('d M Y')}}</p>
                                                                        </td>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <td class="col-12">
                                                                    <p class="mb-0">user hasn't posted yet</p>
                                                                </td>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-3 pt-5">
                                                <div class="row mb-4">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon red">
                                                            <i class="iconly-boldBookmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Total Posts</h6>
                                                        <h6 class="font-extrabold mb-0">{{$posts->count()}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <div class="col-12 col-lg-9">
                                                <div class="d-flex justify-content-between">
                                                    <h6>{{$client->first_name}} {{$client->last_name}} Chats</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>Therapist</th>
                                                                <th>Topic</th>
                                                                <th></th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($chats as $chat)
                                                            @php
                                                                $therapist = $therapists->where('id',$chat->therapist_id)->first();
                                                            @endphp
                                                                <tr>
                                                                    <td class="col-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <a href="{{url('admin/view_chat/'.$chat->id)}}" class="font-bold ms-3 mb-0 text-truncate">{{$therapist->first_name}} {{$therapist->last_name}}</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-auto">
                                                                        <td class="col-auto">
                                                                            <p class=" mb-0">{{$chat->created_at->format('d M Y')}}</p>
                                                                        </td>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <td class="col-12">
                                                                    <p class="mb-0">user hasn't had any chat with therapists yet</p>
                                                                </td>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-3 pt-5">
                                                <div class="row mb-4">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon red">
                                                            <i class="iconly-boldBookmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Total Chats</h6>
                                                        <h6 class="font-extrabold mb-0">{{$chats->count()}}</h6>
                                                    </div>
                                                </div>
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
