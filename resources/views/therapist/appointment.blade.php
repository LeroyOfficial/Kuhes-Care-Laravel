<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Appointment';
    @endphp
    @include('components.user.css')
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/simple-datatables/style.css')}}">
</head>

<body>
    <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
        <div>
            <a class="btn p-1 btn-hover-second" role="button" href="{{url('therapist/appointments')}}">
                <i class="fas fa-arrow-left fs-4"></i>
            </a>
        </div>
        <div>
            <h4 class="color-second">Appointment with {{$client->first_name}} {{$client->last_name}}</h4>
        </div>
        <div>
        </div>
    </div>
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h1>Appointment with {{$client->first_name}} {{$client->last_name}}</h1>
            </div>

            <div class="">
                <div class="row">
                    <div class="therapist rounded-2 col-sm-6 col-md-3 p-2 m-0" style="cursor: pointer;">
                        <span class="therapist_id d-none">{{$client->id}}</span>
                        <div class="rounded-2">
                            <div class="text-center">
                                @if ($client->gender == 'male')
                                <img class="rounded-circle vh-20" alt="{{$client->first_name}}'s image" src="{{asset('admin/assets/images/faces/4.jpg')}}">
                            @else
                                <img class="rounded-circle vh-20" alt="{{$client->first_name}}'s image" src="{{asset('admin/assets/images/faces/5.jpg')}}">
                            @endif
                            </div>
                            <div class="py-2 text-center">
                                <h4 class="color-main">{{$client->first_name}} {{$client->last_name}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-9">
                        <div class="row mb-4">
                            <div class="col-6">
                                <span class="fw-bold fs-6">Date</span>
                                <h4>{{\Carbon\Carbon::parse($appointment->date_and_time)->format('d M Y')}}</h4>
                            </div>
                            <div class="col-6">
                                <span class="fw-bold fs-6">Time</span>
                                <h4>{{\Carbon\Carbon::parse($appointment->date_and_time)->format('H:i')}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span class="fw-bold fs-6">Status</span>
                                <br/>
                                <h5 class="badge fs-6 text-capitalize
                                    @if($appointment->status == 'pending') bg-warning
                                        @elseif ($appointment->status == 'approved') bg-success
                                        @elseif ($appointment->status == 'completed') bg-secondary
                                        @elseif ($appointment->status == 'cancelled') bg-danger
                                    @endif
                                    ">
                                    {{$appointment->status}}
                                </h5>
                            </div>
                            <div class="col-6">
                                @if ($appointment->status == 'pending')
                                    <span class="fw-bold fs-6">Action</span>
                                    <br/>
                                    <a href="{{url('therapist/approve_appointment/'.$appointment->id)}}" role="button" class="btn btn-success">
                                        Approve Appointment
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <span class="fw-bold fs-6">Reason</span>
                    <p>{{$appointment->topic}}</p>
                </div>

            </div>
        </div>
    </div>

    @include('components.user.auth.footer')
</body>
</html>
