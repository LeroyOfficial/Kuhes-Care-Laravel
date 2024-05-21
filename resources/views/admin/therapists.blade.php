<!DOCTYPE html>
<html lang="en">

<?php $page_title = 'Therapists'; ?>

<head>
    @include('components.admin.css')
</head>

<body>
    <div id="app">
        @include('components.admin.sidebar')
        <div id="main">
            @include('components.admin.header')

            <div class="page-heading">
                <h3>Therapists</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h4>List of Therapists</h4>

                                            <div class="d-flex">
                                                <a href="{{url('admin/generate_report/all_therapists/all/all')}}" role="button" class="btn btn-bg-main text-white me-2">Generate Report</a>

                                                <a href="{{url('admin/new_therapist')}}" role="button" class="btn btn-bg-second text-white">Add a new Therapist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('message'))
                                            @include('components.admin.alert')
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($therapists as $therapist)
                                                        <tr>
                                                            <td class="col-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-md">
                                                                        <img src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
                                                                    </div>
                                                                    <a href="{{url('admin/therapist/'.$therapist->id)}}" class="font-bold ms-3 mb-0">{{$therapist->first_name}} {{$therapist->last_name}}</a>
                                                                </div>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class=" mb-0">{{$therapist->phone_number}}</p>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class=" mb-0">{{$therapist->email}}</p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
