<!DOCTYPE html>
<html>
<head>
    <title>Kuhes Care - {{$client->first_name}} {{$client->last_name}} Report</title>
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

        <h3>{{$client->first_name}} {{$client->last_name}} Report</h3>
    </div>

    <div style="">

    </div>

    <div class="">
        <h5>Chats</h5>
        @if($chats->count() > 0)
            <table>
                <thead style="font-weight: bold">
                    <tr>
                        <td style="background-color: #03424c; color:white;">Therapist</td>
                        <td style="background-color: #03424c; color:white;">Date</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chats as $chat)
                        @php
                            $therapist = $therapists->where('id',$chat->therapist_id)->first();
                        @endphp
                        <tr>
                            <td>{{$therapist->first_name}} {{$therapist->last_name}}</td>
                            <td>{{$chat->created_at->format('d M Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Chats Available</h1>
        @endif
    </div>

    <div class="">
        <h5>Posts</h5>
        @if($posts->count() > 0)
            <table>
                <thead style="font-weight: bold">
                    <tr>
                        <td style="background-color: #03424c; color:white;">Title</td>
                        <td style="background-color: #03424c; color:white;">Caption</td>
                        <td style="background-color: #03424c; color:white;">Likes</td>
                        <td style="background-color: #03424c; color:white;">Comments</td>
                        <td style="background-color: #03424c; color:white;">Date</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        @php
                            $comments_count = $comments->where('post_id',$post->id)->count();
                        @endphp
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->caption}}</td>
                            <td>{{$post->likes_count}}</td>
                            <td>{{$comments_count}}</td>
                            <td>{{$post->created_at->format('d M Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Posts Available</h1>
        @endif
    </div>
</body>
</html>
