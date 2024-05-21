<!DOCTYPE html>
<html lang="en">

<?php $page_title = 'Payments'; ?>

<head>
    @include('components.admin.css')
</head>

<body>
    <div id="app">
        @include('components.admin.sidebar')
        <div id="main">
            @include('components.admin.header')

            <div class="page-heading">
                <h3>Payments</h3>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h4>List of Payments</h4>

                                            @if($payments->count() > 0)
                                                <a href="{{url('admin/generate_report/all_payments/all/all')}}" role="button" class="btn btn-bg-main text-white">Generate Report</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('message'))
                                            @include('components.admin.alert')
                                        @endif

                                        @if($payments->count() > 0)
                                            <div class="table-responsive">
                                                <table class="table" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>Client</th>
                                                            <th>Amount</th>
                                                            <th>Method</th>
                                                            <th>Reference</th>
                                                            <th>TransID</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($payments as $payment)
                                                            <tr>
                                                                <td class="col-3">
                                                                    <div class="d-flex align-items-center">
                                                                        @php
                                                                            $client = $clients->where('id',$payment->client_id)->first();
                                                                        @endphp
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
                                                                    <p class=" mb-0">K{{$payment->amount}}</p>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0">{{$payment->method}}</p>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0">{{$payment->name}}</p>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0">{{$payment->trans_id}}</p>
                                                                </td>
                                                                <td class="col-auto">
                                                                    <p class=" mb-0">{{$payment->created_at->format('d M Y')}}</p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <th>Total</th>
                                                            <th>K{{$total_amount}}</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <th>Total</th>
                                                        <th>K{{$total_amount}}</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <h4>No Payments Available</h4>
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
