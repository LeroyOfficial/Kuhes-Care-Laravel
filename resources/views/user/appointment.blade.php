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
            <a class="btn p-1 btn-hover-second" role="button" href="{{url('user/appointments')}}">
                <i class="fas fa-arrow-left fs-4"></i>
            </a>
        </div>
        <div>
            <h4 class="color-second">Appointment with {{$therapist->first_name}} {{$therapist->last_name}}</h4>
        </div>
        <div>
        </div>
    </div>
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h1>Appointment with {{$therapist->first_name}} {{$therapist->last_name}}</h1>
            </div>

            <div class="">
                <div class="row">
                    <div class="therapist rounded-2 col-sm-6 col-md-3 p-2 m-0" style="cursor: pointer;">
                        <span class="therapist_id d-none">{{$therapist->id}}</span>
                        <div class="rounded-2">
                            <div class="text-center">
                                <img class="rounded-2 vh-20" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
                            </div>
                            <div class="py-2 text-center">
                                <h6 class="color-second">{{$therapist->specialist}}</h6>
                                <a href="{{url('user/therapist/'.$therapist->id)}}" class="color-main fs-4">{{$therapist->first_name}} {{$therapist->last_name}}</a>
                                @php
                                    $therapist_avg_rating = number_format($rating->where('therapist_id',$therapist->id)->avg('star_count'), 1);
                                @endphp
                                <div class="d-flex align-items-center justify-content-around mb-2">
                                    <span class="me-2">
                                        <i class="fas fa-star @if($therapist_avg_rating >= 1) color-second @else color-main @endif"></i>
                                        <i class="fas fa-star @if($therapist_avg_rating >= 2) color-second @else color-main @endif"></i>
                                        <i class="fas fa-star @if($therapist_avg_rating >= 3) color-second @else color-main @endif"></i>
                                        <i class="fas fa-star @if($therapist_avg_rating >= 4) color-second @else color-main @endif"></i>
                                        <i class="fas fa-star @if($therapist_avg_rating >= 5) color-second @else color-main @endif"></i>
                                    </span>
                                    <span class="fs-6 fw-bold">@if($therapist_avg_rating > 0) {{$therapist_avg_rating}}/5 @else 0/5 @endif</span>
                                </div>
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
                                    <a href="{{url('user/cancel_appointment/'.$appointment->id)}}" role="button" class="btn btn-danger">
                                        Cancel Appointment
                                    </a>
                                @elseif ($appointment->status == 'approved' && \Carbon\Carbon::parse($appointment->date_and_time)->isToday())
                                    <a href="{{url('user/new_chat/'.$therapist->id)}}" role="button" class="btn btn-bg-second">Chat with Therapist</a>
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
