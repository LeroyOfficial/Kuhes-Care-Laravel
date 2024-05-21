<!DOCTYPE html>
<html>
<head>
    <title>Kuhes Care - {{$therapist->first_name}} {{$therapist->last_name}} Report</title>
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

        <h3>{{$therapist->first_name}} {{$therapist->last_name}} Therapist Report</h3>

        <h3>
            <span style="text-transform: capitalize; margin-end:2px;">{{$duration}}</span> History ({{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }})
        </h3>
    </div>

    <div style="">

    </div>

    <div class="">
        <h5>Books</h5>
        @if($books->count() > 0)
            <table>
                <thead style="font-weight: bold">
                    <tr>
                        <td style="background-color: #03424c; color:white;">Title</td>
                        <td style="background-color: #03424c; color:white;">Reads</td>
                        <td style="background-color: #03424c; color:white;">Likes</td>
                        <td style="background-color: #03424c; color:white;">Comments</td>
                        <td style="background-color: #03424c; color:white;">Date</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        @php
                            $comments_count = $book_comments->where('book_id',$book->id)->count();
                        @endphp
                        <tr>
                            <td>{{$book->title}}</td>
                            <td>{{$book->read_count}}</td>
                            <td>{{$book->like_count}}</td>
                            <td>{{$comments_count}}</td>
                            <td>{{$book->created_at->format('d M Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Books Available</h1>
        @endif
    </div>

    <div class="">
        <h5>Videos</h5>
        @if($videos->count() > 0)
            <table>
                <thead style="font-weight: bold">
                    <tr>
                        <td style="background-color: #03424c; color:white;">Title</td>
                        <td style="background-color: #03424c; color:white;">Views</td>
                        <td style="background-color: #03424c; color:white;">Likes</td>
                        <td style="background-color: #03424c; color:white;">Comments</td>
                        <td style="background-color: #03424c; color:white;">Date</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        @php
                            $comments_count = $video_comments->where('video_id',$video->id)->count();
                        @endphp
                        <tr>
                            <td>{{$video->title}}</td>
                            <td>{{$video->view_count}}</td>
                            <td>{{$video->like_count}}</td>
                            <td>{{$comments_count}}</td>
                            <td>{{$video->created_at->format('d M Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Videos Available</h1>
        @endif
    </div>

</body>
</html>
