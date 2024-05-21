<!DOCTYPE html>
<html lang="en">

<?php $page_title = 'Clients'; ?>

<head>
    @include('components.admin.css')
</head>

<body>
    <div id="app">
        @include('components.admin.sidebar')
        <div id="main">
            @include('components.admin.header')

            <div class="page-heading">
                <h3>Clients</h3>
            </div>
            
            <div class="page-content">
                <section class="row">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h4>List of Clients</h4>

                                            @if($clients->count() > 0)
                                                <a href="{{url('admin/generate_report/all_clients/all/all')}}" role="button" class="btn btn-bg-main text-white">Generate Report</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('message'))
                                            @include('components.admin.alert')
                                        @endif

                                        @if($clients->count() > 0)
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
                                                        @foreach ($clients as $client)
                                                            <tr>
                                                                <td class="col-3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-md">
                                                                            @if ($client->gender == 'male')
                                                                                <img src="{{asset('admin/assets/images/faces/4.jpg')}}">
                                                                            @else
                                                                                <img src="{{asset('admin/assets/images/faces/5.jpg')}}">
                                                                            @endif
                                                                        </div>
                                                                        <a href="{{url('admin/client/'.$client->id)}}" class="font-bold ms-3 mb-0">{{$client->first_name}} {{$client->last_name}}</a>
                                                                    </div>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0">{{$client->phone_number}}</p>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0">{{$client->email}}</p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <h4>No Clients Available</h4>
                                            </div>
                                        @endif
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
