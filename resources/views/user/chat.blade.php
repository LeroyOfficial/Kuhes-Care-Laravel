<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Chat with '.$therapist->first_name.' '.$therapist->last_name;

    @endphp
    @include('components.user.css')
</head>

<body>
    <div class="row vh-100 overflow-hidden">

        <div id="side-bar" class="col-2 p-0 bg-white text-white">
            <div class="text-start px-1 d-flex align-items-center bg-main vh-10">
                <div>
                    <a class="btn p-1" role="button" href="{{url('user/dashboard')}}">
                    <i class="fas fa-arrow-left fs-4"></i>
                </a>
            </div>
                <h1 class="d-none">Therapists</h1>
            </div>
            <div id="therapist-list" class="chat-list vh-90 overflow-auto px-0 border-end bottom-1 border-main">
                @forelse ($chats as $chat)
                    @php
                        $current_therapist = $therapists->where('id',$chat->therapist_id)->first();
                    @endphp

                    <div id="therapist-{{$chat->id}}" class="chat @if($chat->id == $selected_chat->id) selected @endif d-flex align-items-center py-2 px-1 m-0" style="cursor: pointer;">
                        <div class="chat-id d-none">{{$chat->id}}</div>
                        <div class="d-flex me-2">
                            <img class="rounded-circle m-0"
                                src="{{asset('Therapist_Pics/'.$current_therapist->image_url)}}"
                                alt="{{$current_therapist->first_name}}'s DP"
                            >
                            <i class="fas fa-circle text-success" style="font-size: 10px;"></i>
                        </div>
                        <span class="chat-name d-flex flex-column justify-content-center me-2">
                            <span class="fw-bold">
                                {{$current_therapist->first_name}}
                                {{$current_therapist->last_name}}
                            </span>
                            @if ($other_chat_messages->count() > 0)
                                <span class="text-truncate">{{$other_chat_messages->where('chat_id',$chat->id)->value('message')}}</span>
                            @endif                        </span>
                        @if ($other_chat_messages->where('chat_id',$chat->id)->where('sender_id','!=','C-'.$client->id)->where('seen',false)->count()  > 0)
                            <span class="chat-new-message-count bg-main rounded-circle px-1 top-50">{{$other_chat_messages->where('chat_id',$chat->id)->where('sender_id','!=','C-'.$client->id)->where('seen',false)->count()}}</span>
                        @endif
                    </div>
                @empty
                    <h4 class="color-main">no chats available</h4>
                @endforelse
            </div>
        </div>

        @if(!$selected_chat)
            <div class="col-10 p-0">
                <div class="color-second row py-1 px-0 bg-main vh-10"></div>
                <div class="vh-90 bg-white">
                    <div class="vh-10">
                        <div class="message-list vh-90 d-flex align-items-center justify-content-center bg-grey" style="background: url({{asset('assets/img/jt4AoG.jpg')}}) center / 40vw repeat;">
                            <div class="p-2 bg-white text-center text-dark rounded-4 shadow-sm">
                                <h4>No Chat Selected</h4>
                                <h5>Select a chat</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @php
                $chat = $selected_chat
            @endphp
            <div id="chat" class="col-10 p-0">
                <span class="selected-chat-id d-none">{{$chat->id}}</span>
                <span id="user_id" class="d-none">C-{{Auth::user()->id}}</span>

                <div class="color-second row py-1 px-0 bg-main vh-10">
                    <div class="col-9">
                        <div class="col-6">

                            <a class="d-flex align-items-center" href="{{url('user/therapist/'.$chat->therapist_id)}}">
                                <img id="therapist_pic" class="rounded-circle me-2" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}" style="width: 50px;">
                                <div class="">

                                    <h4 class="m-0">{{$therapist->first_name}} {{$therapist->last_name}}</h4>

                                    <span class="fw-bold text-white" style="font-size: 12px;">
                                        @if($therapist_online)
                                            <span class="d-flex align-items-start">
                                                <span class="me-1">Online</span>
                                                {{-- <i class="fas fa-circle text-success" style="font-size: 10px;"></i> --}}
                                            </span>
                                        @else
                                            @if($therapist_last_seen->isToday())
                                                <span>Last Seen Today at {{$therapist_last_seen->format('H:i')}}</span>
                                            @else
                                                @if ($therapist_last_seen->isYesterday())
                                                    <span>Last Seen Yesterday at {{$therapist_last_seen->format('H:i')}}</span>
                                                @else
                                                    <span>Last Seen on {{$therapist_last_seen->format('d M')}} at {{$therapist_last_seen->format('H:i')}}</span>
                                                @endif
                                            @endif
                                        @endif
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center justify-content-end">
                        <a class="btn p-1 me-4" role="button" href="{{url('user/chat/'.$chat->id.'/voice_call')}}">
                        <i class="fas fa-phone-alt fs-4 p-0"></i>
                    </a>
                        <a class="btn p-1 me-4" role="button" href="{{url('user/chat/'.$chat->id.'/video_call')}}">
                        <i class="fas fa-video fs-4 p-0"></i>
                    </a>
                        <div class="dropdown">
                            <button class="btn p-0 btn-hover-none" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                            <i class="fas fa-align-justify fs-4"></i>
                        </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('user/therapist/'.$chat->therapist_id)}}">View Profile</a>
                                <a class="dropdown-item" href="{{url('user/delete_chat/'.$chat->id)}}">Delete Chat</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="vh-90 bg-white">
                    <div class="vh-10">
                        <div id="message-list" class="message-list vh-80 overflow-auto py-2 bg-grey" style="background: url({{asset('assets/img/jt4AoG.jpg')}}) center / 40vw repeat;">
                            <div id="chat-to-chat" class="d-flex justify-content-center mb-4">
                                <div class="bg-main p-2 rounded">
                                    <p>Chat is Protected end to end</p>
                                </div>
                            </div>

                            @if($messages->count() > 0)

                                    @if($unread_messages->count() > 0)
                                        @foreach ($grouped_read_messages as $date => $messages )
                                            <div id="date" class="date text-center mb-4 p-2">
                                                @if (\Carbon\Carbon::parse($date)->isToday())
                                                    <span class="fw-bold bg-white rounded-pill p-1 px-2">Today</span>
                                                @elseif (\Carbon\Carbon::parse($date)->isYesterday())
                                                <span class="fw-bold bg-white rounded-pill p-1 px-2">Yesterday</span>
                                                @else
                                                    <span class="fw-bold bg-white rounded-pill p-1 px-2">{{$date}}</span>
                                                @endif
                                            </div>
                                            @foreach ($read_messages as $message)
                                                <div id="message-{{$message->id}}" class="message @if($message->sender_id == 'C-'.$client->id) sent @else received @endif mb-4 d-flex">
                                                    <span class="message-id d-none">{{$message->id}}</span>
                                                    <div class="px-2">
                                                        @if ($message->sender_id == 'C-'.$client->id)
                                                            <img
                                                                class="rounded-circle user-pic"
                                                                style="width: 50px;"
                                                                alt="{{$client->first_name}}'s image"
                                                                @if ($client->gender == 'male')
                                                                    src="{{asset('admin/assets/images/faces/4.jpg')}}"
                                                                @else
                                                                    src="{{asset('admin/assets/images/faces/5.jpg')}}"
                                                                @endif
                                                                >
                                                        @else
                                                            <img class="user-pic rounded-circle" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
                                                        @endif
                                                    </div>
                                                    <div class="message-box p-2 rounded">
                                                        @if($message->image_url)
                                                            <a href="{{asset('Message_Pics/'.$message->image_url)}}" class="mb-2">
                                                                <img class="rounded" src="{{asset('Message_Pics/'.$message->image_url)}}">
                                                            </a>
                                                        @endif
                                                        <p>{{$message->message}}</p>
                                                        <div class="text-end">
                                                            <span>{{$message->created_at->format('H:i')}}</span>
                                                            @if ($message->sender_id == 'C-'.$client->id && $message->seen == 1)
                                                                <span>seen</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach

                                        <div id="unread" class="unread-div text-center mb-4 p-2">
                                            <span class="fw-bold bg-white rounded-pill p-1 px-2">Unread</span>
                                        </div>

                                        @foreach ($grouped_unread_messages as $date => $messages )
                                            <div id="date" class="date text-center mb-4 p-2">
                                                @if (\Carbon\Carbon::parse($date)->isToday())
                                                    <span class="fw-bold bg-white rounded-pill p-1 px-2">Today</span>
                                                @elseif (\Carbon\Carbon::parse($date)->isYesterday())
                                                <span class="fw-bold bg-white rounded-pill p-1 px-2">Yesterday</span>
                                                @else
                                                    <span class="fw-bold bg-white rounded-pill p-1 px-2">{{$date}}</span>
                                                @endif
                                            </div>
                                            @foreach ($unread_messages as $message)
                                                <div id="message-{{$message->id}}" class="message received mb-4 d-flex">
                                                    <span class="message-id d-none">{{$message->id}}</span>
                                                    <div class="px-2">
                                                        <img class="user-pic rounded-circle" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
                                                    </div>
                                                    <div class="message-box p-2 rounded">
                                                        @if($message->image_url)
                                                            <a href="{{asset('Message_Pics/'.$message->image_url)}}" class="mb-2">
                                                                <img class="rounded" src="{{asset('Message_Pics/'.$message->image_url)}}">
                                                            </a>
                                                        @endif
                                                        <p>{{$message->message}}</p>
                                                        <div class="text-end">
                                                            <span>{{$message->created_at->format('H:i')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @else
                                        @foreach ($grouped_messages as $date => $messages )
                                            <div id="date" class="date text-center mb-4 p-2">
                                                @if (\Carbon\Carbon::parse($date)->isToday())
                                                    <span class="fw-bold bg-white rounded-pill p-1 px-2">Today</span>
                                                @elseif (\Carbon\Carbon::parse($date)->isYesterday())
                                                <span class="fw-bold bg-white rounded-pill p-1 px-2">Yesterday</span>
                                                @else
                                                    <span class="fw-bold bg-white rounded-pill p-1 px-2">{{$date}}</span>
                                                @endif
                                            </div>
                                            @foreach ($messages as $message)
                                                <div id="message-{{$message->id}}" class="message @if($message->sender_id == 'C-'.$client->id) sent @else received @endif mb-4 d-flex">
                                                    <span class="message-id d-none">{{$message->id}}</span>
                                                    <div class="px-2">
                                                        @if ($message->sender_id == 'C-'.$client->id)
                                                            <img
                                                                class="rounded-circle user-pic"
                                                                style="width: 50px;"
                                                                alt="{{$client->first_name}}'s image"
                                                                @if ($client->gender == 'male')
                                                                    src="{{asset('admin/assets/images/faces/4.jpg')}}"
                                                                @else
                                                                    src="{{asset('admin/assets/images/faces/5.jpg')}}"
                                                                @endif
                                                                >
                                                        @else
                                                            <img class="user-pic rounded-circle" src="{{asset('Therapist_Pics/'.$therapist->image_url)}}">
                                                        @endif
                                                    </div>
                                                    <div class="message-box p-2 rounded">
                                                        @if($message->image_url)
                                                            <a href="{{asset('Message_Pics/'.$message->image_url)}}" class="mb-2">
                                                                <img class="rounded" src="{{asset('Message_Pics/'.$message->image_url)}}">
                                                            </a>
                                                        @endif
                                                        <p>{{$message->message}}</p>
                                                        <div class="text-end">
                                                            <span>{{$message->created_at->format('H:i')}}</span>
                                                            @if ($message->sender_id == 'C-'.$client->id && $message->seen == 1)
                                                                <span>seen</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @endif
                                {{-- @endforeach --}}
                            @else
                                <div class="text-center">
                                    <h4>No messages sent yet</h4>
                                </div>
                            @endif

                            {{-- <div id="the-end" class="the-end">
                            </div> --}}
                        </div>
                        <div id="img-preview-div" class="preview-div d-flex d-none justify-content-end p-0">
                            <div class="text-end" style="height: 40vh;margin-right: 1vw;width: 30vw;margin-top: -36vh;margin-bottom: -10vh;">
                                <img id="preview" src="">
                            </div>
                        </div>
                        <div class="bg-white py-1">
                            <form method="POST" action="{{url('user/chat/'.$chat->id.'/send_message')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex px-1">
                                    <textarea class="form-control" required="" name="message" placeholder="Type your message..."></textarea>
                                    <input id="image-input" class="form-control d-none" type="file" name="image" accept="image/*">
                                    <div class="d-flex flex-column justify-content-center p-2">
                                        <button id="add-image-btn" class="btn btn-hover-none" type="button">
                                            <i class="fas fa-paperclip attachment fs-3"></i>
                                        </button>
                                    </div>
                                    <div class="p-1">
                                        <button class="btn text-white fw-bold btn-bg-second" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @include('components.user.auth.footer')
    <script src="{{asset('assets/js/chat.js')}}"></script>
</body>

</html>
