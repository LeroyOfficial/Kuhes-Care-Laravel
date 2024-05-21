<!DOCTYPE html>
<html>
<head>
    <title>Kuhes Care - All Therapists Report</title>
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

        <h3>All Therapists Report</h3>
    </div>

    <div class="">
        @if($therapists->count() > 0)
            <table>
                <thead style="font-weight: bold">
                    <tr>
                        <td style="background-color: #03424c; color:white;">Name</td>
                        <td style="background-color: #03424c; color:white;">Gender</td>
                        <td style="background-color: #03424c; color:white;">Qualification</td>
                        <td style="background-color: #03424c; color:white;">About</td>
                        <td style="background-color: #03424c; color:white;">Date Added</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($therapists as $therapist)
                        <tr>
                            <td class="col-3">{{$therapist->first_name}} {{$therapist->last_name}}</td>
                            <td class="col-auto">{{$therapist->gender}}</td>
                            <td class="col-auto">{{$therapist->qualification}}</td>
                            <td class="col-auto">{{$therapist->about}}</td>
                            <td>{{$therapist->created_at->format('d M Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Therapists Available</h1>
        @endif
    </div>
</body>
</html>
