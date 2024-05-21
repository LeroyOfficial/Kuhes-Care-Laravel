<!DOCTYPE html>
<html>
<head>
    <title>Kuhes Care - All Clients Report</title>
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

        <h3>All Clients Report</h3>
    </div>

    <div class="">
        @if($clients->count() > 0)
            <table>
                <thead style="font-weight: bold">
                    <tr>
                        <td style="background-color: #03424c; color:white;">Name</td>
                        <td style="background-color: #03424c; color:white;">Gender</td>
                        <td style="background-color: #03424c; color:white;">Age</td>
                        <td style="background-color: #03424c; color:white;">Signup Date</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="col-3">{{$client->first_name}} {{$client->last_name}}</td>
                            <td class="col-auto">{{$client->gender}}</td>
                            <td class="col-auto">{{$client->date_of_birth}}</td>
                            <td>{{$client->created_at->format('d M Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Clients Available</h1>
        @endif
    </div>
</body>
</html>
