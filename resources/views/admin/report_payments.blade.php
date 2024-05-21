<!DOCTYPE html>
<html>
<head>
    <title>Kuhes Care - All Payment Report</title>
    <style>
        :root {
            --color-main: #03424c;
            --color-second: #f46405;
            --color-grey: #d3d3d3;
        }

        .k {
            color: #03424c;
            margin-right: 0.2vw;
        }

        .c {
            color: #f46405;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            text-align: left;
        }
    </style>
</head>

<body>
    <div style="text-align: center">

        <h2 style="font-weight: bold;">
            <span class="k">Kuhes</span>
            <span class="c">Care</span>
        </h2>

        <h3>All Payment Report</h3>
    </div>

    <div class="">
        @if($payments->count() > 0)
            <table>
                <thead style="font-weight: bold">
                    <tr>
                        <th style="background-color: #03424c; color:white;">Client</th>
                        <th style="background-color: #03424c; color:white;">Amount</th>
                        <th style="background-color: #03424c; color:white;">Method</th>
                        <th style="background-color: #03424c; color:white;">Reference</th>
                        <th style="background-color: #03424c; color:white;">TransID</th>
                        <th style="background-color: #03424c; color:white;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            @php
                                $client = $clients->where('id',$payment->client_id)->first();
                            @endphp
                            <td>{{$client->first_name}} {{$client->last_name}}</td>
                            <td>K{{$payment->amount}}</td>
                            <td>{{$payment->method}}</td>
                            <td>{{$payment->name}}</td>
                            <td>{{$payment->trans_id}}</td>
                            <td>{{$payment->created_at->format('d M Y')}}</td>
                        </tr>
                    @endforeach
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
        @else
            <h1>No Clients Available</h1>
        @endif
    </div>
</body>
</html>
