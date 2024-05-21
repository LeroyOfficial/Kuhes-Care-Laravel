<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Appointments';
    @endphp
    @include('components.user.css')
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/simple-datatables/style.css')}}">
</head>

<body>
    <div class="vh-10 vw-100 bg-main d-flex align-items-center justify-content-between px-2">
        <div>
            <a class="btn p-1 btn-hover-second" role="button" href="{{url('therapist/dashboard')}}">
                <i class="fas fa-arrow-left fs-4"></i>
            </a>
        </div>
        <div>
            <h4 class="color-second">Appointments</h4>
        </div>
        <div>
        </div>
    </div>

    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-4">
                <h4>Appointments</h4>
            </div>
            @if($appointments->count() > 0)
            <div class="table-responsive">
                <table  id="table1" class="table">
                    <thead>
                        <tr>
                            <td style="background-color: var(--color-main); color:white;">Client</td>
                            <td style="background-color: var(--color-main); color:white;">Topic</td>
                            <td style="background-color: var(--color-main); color:white;">Status</td>
                            <td style="background-color: var(--color-main); color:white;">Date</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                        @php
                            $client = $clients->where('id',$appointment->client_id)->first();
                        @endphp
                            <tr>
                                <td>
                                    <a href="{{url('therapist/appointment/'.$appointment->id)}}">{{$client->first_name}} {{$client->last_name}}</a>
                                </td>
                                <td>
                                    {{$appointment->topic}}
                                </td>
                                <td>
                                    <span class="
                                        badge text-white
                                        @if($appointment->status == 'pending') bg-warning
                                            @elseif ($appointment->status == 'approved') bg-success
                                            @elseif ($appointment->status == 'completed') bg-secondary
                                            @elseif ($appointment->status == 'cancelled') bg-danger
                                        @endif
                                        ">
                                        {{$appointment->status}}
                                    </span>
                                </td>
                                <td>
                                    {{\Carbon\Carbon::parse($appointment->date_and_time)->format('d M Y')}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <div class="text-center">
                    <h3>it seems that you haven't had any appointments yet</h3>
                </div>
            @endif
        </div>
    </div>

    @include('components.user.auth.footer')

    <script src="{{asset('admin/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</body>
</html>
