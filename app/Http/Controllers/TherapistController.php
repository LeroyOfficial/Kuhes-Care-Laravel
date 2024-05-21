<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Client;
use App\Models\Therapist;
use App\Models\Chat;
use App\Models\Message;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostCommentReply;

use App\Models\Book;
use App\Models\BookComment;
use App\Models\BookCommentReply;

use App\Models\Video;
use App\Models\VideoComment;
use App\Models\VideoCommentReply;

use App\Models\Appointment;

use Carbon\Carbon;

use FFMpeg\FFMpeg;

class TherapistController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $user_first_name = $therapist->first_name;

        // $unread_messages = Messages::where('sender_id')

        return view('therapist.home',compact('user_first_name'));
    }

    public function Chats()
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $chats = Chat::where('therapist_id',$therapist->id)->get();

        $messages = Message::orderBy('created_at','desc')->get();

        $other_chat_messages = $messages;

        $clients = Client::all();

        $selected_chat = null;

        return view('therapist.chat', compact('therapist','clients','chats','other_chat_messages','messages','selected_chat'));
    }

    public function Chat($id)
    {

        $chat = Chat::find($id);

        if(!$chat)
            {
                return redirect('therapist/chats');
            }

        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $chats = Chat::where('therapist_id',$therapist->id)->get();
        $other_chat_messages = Message::orderBy('created_at','desc')->get();

        $selected_chat = $chat;
        $messages = Message::where('chat_id',$chat->id)->get();

        $unread_messages = Message::where('chat_id',$chat->id)
        ->where('sender_id','!=','T-'.$therapist->id)->where('seen',0)->get();

        $read_messages = $messages;
        $grouped_unread_messages = null;
        $grouped_read_messages = null;
        $read_messages = null;
        if($unread_messages->count() > 0)
            {
                $grouped_unread_messages = $unread_messages->groupBy(function($message)
                {
                    return $message->created_at->format('Y-m-d');
                });

                $read_messages = Message::where('chat_id',$chat->id)->where('seen',1)->get();

                foreach($unread_messages as $message)
                    {
                        $message->seen = true;
                        $message->save();
                    }

                $grouped_read_messages = $read_messages->groupBy(function($message)
                    {
                        return $message->created_at->format('Y-m-d');
                    });
            }

        $clients = Client::all();

        $client = Client::where('id',$chat->client_id)->first();
        $client_account = User::where('email',$client->email)->first();

        $client_last_seen = Carbon::parse($client_account->last_seen);

        $client_online = false;

        if(Carbon::now()->diffInMinutes($client_last_seen) < 2)
            {
                $client_online = true;
            }

        $messages = Message::where('chat_id',$chat->id)->get();
        $grouped_messages = $messages->groupBy(function($message)
            {
                return $message->created_at->format('Y-m-d');
            });

        return view('therapist.chat',compact(
            'therapist','chats','client','clients','client_online',
            'client_last_seen','chat','selected_chat',
            'messages','read_messages','unread_messages',
            'grouped_messages','grouped_unread_messages',
            'grouped_read_messages','other_chat_messages'
        ));
    }

    public function SendMessage(Request $request ,$id)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $message = new Message;
        $message->chat_id = $id;
        $message->sender_id = 'T-'.$therapist->id;
        $message->message = $request->message;

        $image = $request->image;

        if($image)
            {
                $imagename = 'MessagePic'.'-'.$user->name.'_'.time().'.'.$image->getClientoriginalExtension();
                $image->move('Message_Pics',$imagename);
                $message->image_url = $imagename;
            }

        $message->save();

        return redirect()->back();
    }

    public function CheckForNewMessages(Request $request, $id)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $last_message_id = $request->query('last_message_id');

        $chat = Chat::find($id);
        $new_messages = Message::
            where('chat_id',$chat->id)
            ->where('id',">",$last_message_id)
            ->where('sender_id','!=','T-'.$therapist->id)
            ->where('seen',0)
            ->get();

        if($new_messages->count() > 0)
            {
                foreach($new_messages as $message)
                    {
                        $message->seen = true;
                        $message->save();
                    }

                return response()->json([
                    'success' => true,
                    'message' => 'new messages found!!',
                    'new_messages' => $new_messages,
                ]);
            }
        else{
            return response()->json([
                'success' => true,
                'message' => 'no new messages found',
            ]);
        }
    }

    public function PeerChat()
    {
        $posts = Post::latest()->get();
        $client = Client::all();
        $user = User::where('user_type','user')
            ->orWhere('user_type','therapist')
            ->get();

        $comments = PostComment::all();
        return view('therapist.peer_chat', compact('posts', 'user', 'client','comments'));
    }

    public function PostDetails($id)
    {
        $post = Post::find($id);
        if(!$post)
            {
                return redirect('therapist/peer_chat');
            }
        $client = Client::all();

        $therapist = Therapist::all();

        $user = User::where('user_type','user')
            ->orWhere('user_type','therapist')
            ->get();

        $comments = PostComment::where('post_id',$post->id)->get();
        $replies = PostCommentReply::all();
        return view('therapist.post', compact('post','therapist','client','comments','replies','user'));
    }

    public function LikePost($id)
    {
        $post = Post::find($id);
        $post->increment('likes_count');
        $post->save();

        return response()->json([
            'success' => true,
            'message' => "Post liked successfully!",
        ]);
    }

    public function CommentOnPost(Request $request, $id)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $comment = new PostComment;
        $comment->user_id = $user->id;
        $comment->post_id = $id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back();
    }

    public function ReplyOnPostComment(Request $request, $id)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $reply = new PostCommentReply;
        $reply->user_id = $user->id;
        $reply->comment_id = $id;
        $reply->reply = $request->reply;
        $reply->save();

        return redirect()->back();
    }

    public function Books()
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $books = Book::where('therapist_id',$therapist->id)->get();

        $comment = BookComment::all();

        return view('therapist.book_list', compact('therapist','books','comment'));
    }

    public function NewBook()
    {
        return view('therapist.new_book');
    }

    public function PostNewBook(Request $request)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $book = new Book;
        $book->therapist_id = $therapist->id;
        $book->title = $request->book_title;
        $book->details = $request->book_details;

        $image = $request->image;

        if($image)
            {
                $imagename = 'BookPic'.'-'.$request->book_title.' - '.$user->name.'_'.time().'.'.$image->getClientoriginalExtension();
                $image->move('Book_Pics',$imagename);
                $book->image_url = $imagename;
            }

        $book->save();

        return redirect('therapist/books');
    }

    public function BookDetails($id)
    {
        $book = Book::find($id);
        if(!$book)
            {
                return redirect('therapist/books');
            }

        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $user = User::where('user_type','user')
        ->orWhere('user_type','therapist')
        ->get();

        $comments = BookComment::where('book_id',$book->id)->latest()->get();
        $replies = BookCommentReply::all();

        return view('therapist.read_book', compact('book','user','therapist', 'comments', 'replies'));
    }

    public function Videos()
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $videos = Video::where('therapist_id',$therapist->id)->latest()->get();

        $comment = VideoComment::all();

        return view('therapist.videos', compact('therapist','videos','comment'));
    }

    public function NewVideo()
    {
        return view('therapist.new_video');
    }

    public function PostNewVideo(Request $request)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $video = new Video;

        $video->therapist_id = $therapist->id;
        $video->title = $request->video_title;
        $video->description = $request->video_description;

        $videoFile = $request->file('video');
        $fileName = 'Video  - '.$request->video_title.' - '.$user->name.'_'.time().'.'. $videoFile->getClientOriginalExtension();
        $videoFile->move('Videos', $fileName);

        $thumbnail = $request->file('video_thumbnail');

        $thumbnailName = 'VideoThumbnail - '.$request->video_title.' - '.$user->name.'_'.time().'.'.$thumbnail->getClientoriginalExtension();
        $thumbnail->move('Video_Thumbnails', $thumbnailName);


        $video->video_url = $fileName;
        $video->thumbnail_url = $thumbnailName;
        $video->save();

        return redirect('therapist/videos');
    }

    public function VideoDetails($id)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $video = Video::find($id);
        if(!$video)
            {
                return redirect('therapist/videos');
            }

        $user = User::where('user_type','user')
            ->orWhere('user_type','therapist')
            ->get();

        $comments = VideoComment::where('video_id',$video->id)->get();
        $replies = VideoCommentReply::all();

        return view('therapist.video_details', compact('video','user','therapist','comments','replies'));
    }


    public function CommentOnVideo(Request $request, $id)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $comment = new VideoComment;
        $comment->user_id = $user->id;
        $comment->video_id = $id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back();
    }

    public function ReplyOnVideoComment(Request $request, $id)
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $reply = new VideoCommentReply;
        $reply->user_id = $user->id;
        $reply->comment_id = $id;
        $reply->reply = $request->reply;
        $reply->save();

        return redirect()->back();
    }

    public function Appointments()
    {
        $user = Auth::user();
        $therapist = Therapist::where('email',$user->email)->first();

        $appointments = Appointment::where('therapist_id',$therapist->id)->get();
        $clients = Client::all();
        return view('therapist.appointments',compact('appointments','clients'));
    }

    public function Appointment($id)
    {
        $appointment = Appointment::find($id);

        $client = Client::where('id',$appointment->client_id)->first();

        return view('therapist.appointment', compact('appointment','client'));
    }

    public function ApproveAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'approved';
        $appointment->save();

        return redirect()->back();
    }
}
