<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Book Appointment';
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
            <h4 class="color-second">Book Appointment</h4>
        </div>
        <div>
        </div>
    </div>
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h1>Book a new Appointment</h1>
            </div>
            <div class="">
                <div class="">
                    <h4 class="text-capitalize">select a therapist</h4>

                    <div id="therapist-list" class="row justify-content-center p-2 m-0 mb-4">
                        @forelse ($therapists as $therapist)
                            <div class="therapist rounded-2 col-sm-6 col-md-3 p-2 m-0" style="cursor: pointer;">
                                <span class="therapist_id d-none">{{$therapist->id}}</span>
                                <div class="rounded-2">
                                    <div class="text-center">
                                        <img class="rounded-2 vh-20" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
                                    </div>
                                    <div class="py-2 text-center">
                                        <h6 class="color-second">{{$therapist->specialist}}</h6>
                                        <h4 class="color-main">{{$therapist->first_name}} {{$therapist->last_name}}</h4>
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
                        @empty
                            <div class="col-12 text-center">
                                <h1>No Therapists Available</h1>
                            </div>
                        @endforelse
                    </div>
                </div>
                <form action="{{url('user/post_new_appointment')}}" method="post" class="">
                    @csrf
                    <input type="text" name="therapist_id" id="selected-therapist-input" class="d-none" required>

                    <div class="mb-4">
                        <label for="datetime">Select Date And Time</label>
                        <input id="datetime" class="form-control" type="datetime-local" name="date_and_time" required>
                    </div>

                    <div class="mb-4">
                        <label for="topic">Please write the reason for your visit</label>
                        <textarea name="topic" id="topic" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-bg-main">Book Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('components.user.auth.footer')

    <script src="{{asset('assets/js/new_appointment.js')}}"></script>
</body>
</html>
