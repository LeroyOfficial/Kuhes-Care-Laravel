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
use App\Models\Review;

use App\Models\Payment;

use Carbon\Carbon;

use PDF;
use Dompdf\Dompdf;

class UserController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $birthday = Carbon::parse($client->date_of_birth);
        $today = Carbon::today();

        return view('user.home', compact('client','birthday','today'));
    }

    public function TherapistList()
    {
        $therapists = Therapist::all();
        $rating = Review::all();

        return view('user.therapist_list', compact('therapists','rating'));
    }

    public function SearchTherapist(Request $request)
    {
        $searchTerm = $request->query('name');

        $therapists = User::where('user_type','therapist')->where('name','like', "%{$searchTerm}%")->get();

        if($therapists->count() > 0)
            {
                return response()->json([
                    'success' => true,
                    'therapists' => $therapists,
                ]);
            }
        else
            {
                return response()->json([
                    'success' => true,
                    'message' => 'no matching therapist found',
                ]);
            }
    }

    public function TherapistDetails($id)
    {
        $therapist = Therapist::find($id);
        if(!$therapist)
            {
                return redirect('user/therapists');
            }
        $therapist_account = User::where('email',$therapist->email)->first();

        $videos = Video::where('therapist_id',$therapist->id)->get();
        $books = Book::where('therapist_id',$therapist->id)->get();

        $reviews = Review::where('therapist_id',$therapist->id)->get();
        $client = Client::all();

        $therapist_avg_rating = number_format($reviews->avg('star_count'),1);

        $time = Carbon::now();

        $therapist_last_seen = Carbon::parse($therapist_account->last_seen);
        $therapist_online = false;

        if(Carbon::now()->diffInMinutes($therapist_last_seen) < 2)
            {
                $therapist_online = true;
            }

        return view('user.therapist_profile',
            compact('therapist','reviews','client','therapist_avg_rating','videos','books','therapist_online','therapist_last_seen','time'));
    }

    public function PostReview(Request $request)
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $review = new Review;
        $review->client_id = $client->id;
        $review->therapist_id = $request->therapist_id;
        $review->review = $request->review;
        $review->star_count = $request->star_count;
        $review->save();

        return redirect()->back();
    }

    public function Chats()
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $chats = Chat::where('client_id',$client->id)->get();

        return view('user.chats', compact('chats'));
    }

    public function NewChat($id)
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $chat = Chat::
            where('client_id',$client->id)
            ->where('therapist_id',$id)
            ->first();

        if($chat)
            {
                return redirect('user/chat/'.$chat->id);
            }
        else
            {
                $chat = new Chat;
                $chat->client_id = $client->id;
                $chat->therapist_id = $id;
                $chat->save();

                return redirect('user/chat/'.$chat->id);
            }
    }

    public function Chat($id)
    {

        $chat = Chat::find($id);

        if(!$chat)
            {
                return redirect('user/chats');
            }

        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $therapists = Therapist::all();
        $therapist = Therapist::where('id',$chat->therapist_id)->first();
        $therapist_account = User::where('email',$therapist->email)->first();

        $therapist_last_seen = Carbon::parse($therapist_account->last_seen);

        $therapist_online = false;

        if(Carbon::now()->diffInMinutes($therapist_last_seen) < 2)
            {
                $therapist_online = true;
            }

        $chats = Chat::where('client_id',$client->id)->get();
        $other_chat_messages = Message::orderBy('created_at','desc')->get();

        $selected_chat = $chat;
        $messages = Message::where('chat_id',$chat->id)->get();

        $grouped_messages = $messages->groupBy(function($message)
            {
                return $message->created_at->format('Y-m-d');
            });

        $unread_messages = Message::where('chat_id',$chat->id)
        ->where('sender_id','!=','C-'.$client->id)->where('seen',0)->get();

        $read_messages = null;
        $grouped_unread_messages = null;
        $grouped_read_messages = null;
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

        return view('user.chat',compact(
            'client','chats','therapists','therapist','therapist_online',
            'therapist_last_seen','chat','selected_chat',
            'messages','read_messages','unread_messages',
            'grouped_messages','grouped_unread_messages',
            'grouped_read_messages','other_chat_messages'
        ));
    }

    public function SendMessage(Request $request ,$id)
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $message = new Message;
        $message->chat_id = $id;
        $message->sender_id = 'C-'.$client->id;
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
        $client = Client::where('email',$user->email)->first();

        $last_message_id = $request->query('last_message_id');

        $chat = Chat::find($id);
        $new_messages = Message::
            where('chat_id',$chat->id)
            ->where('id',">",$last_message_id)
            ->where('sender_id','!=','C-'.$client->id)
            ->get();

        if($new_messages->count() > 0)
            {
                return response()->json([
                    'success' => true,
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

    public function VideoCall($id)
    {
        $chat = Chat::find($id);

        $therapist = Therapist::where('id',$chat->therapist_id)->first();

        return view('user.video_call', compact('chat', 'therapist'));
    }

    public function VoiceCall($id)
    {
        $chat = Chat::find($id);

        $therapist = Therapist::where('id',$chat->therapist_id)->first();

        return view('user.voice_call', compact('chat', 'therapist'));
    }

    public function DeleteChat($id)
    {
        $chat = Chat::find($id);
        $chat->delete();

        return redirect('user/chats');
    }

    public function PeerChat()
    {
        $posts = Post::latest()->get();
        $client = Client::all();
        $user = User::where('user_type','user')
            ->orWhere('user_type','therapist')
            ->get();

        $comments = PostComment::all();
        return view('user.peer_chat', compact('posts', 'user', 'client','comments'));
    }

    public function SearchPosts(Request $request)
    {
        $searchTerm = $request->query('name');
        $posts = Post::where('title','like', "%{$searchTerm}%")
                ->orWhere('caption','like', "%{$searchTerm}%")->latest()->get();

        if($posts->count() > 0)
            {
                return response()->json([
                    'success' => true,
                    'posts' => $posts,
                ]);
            }
        else
            {
                return response()->json([
                    'success' => true,
                    'message' => 'no matching post found',
                ]);
            }
    }

    public function NewPost(Request $request)
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();
        $post = new Post;

        $post->user_id = $user->id;
        $post->title = $request->post_title;
        $post->caption = $request->post_caption;

        $image = $request->image;

        if($image)
            {
                $imagename = 'PostPic'.'-'.$user->name.'_'.time().'.'.$image->getClientoriginalExtension();
                $image->move('Post_Pics',$imagename);
                $post->image_url = $imagename;
            }

        $post->save();

        return redirect()->back();
    }

    public function PostDetails($id)
    {
        $post = Post::find($id);
        if(!$post)
            {
                return redirect('user/peer_chat');
            }
        $client = Client::all();

        $user = User::where('user_type','user')
            ->orWhere('user_type','therapist')
            ->get();

        $therapist = Therapist::all();

        $comments = PostComment::where('post_id',$post->id)->get();
        $replies = PostCommentReply::all();
        return view('user.post', compact('post','client','therapist','comments','replies','user'));
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
        $client = Client::where('email',$user->email)->first();

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
        $client = Client::where('email',$user->email)->first();

        $reply = new PostCommentReply;
        $reply->user_id = $user->id;
        $reply->comment_id = $id;
        $reply->reply = $request->reply;
        $reply->save();

        return redirect()->back();
    }

    public function Videos()
    {
        $videos = Video::latest()->get();
        $therapist = Therapist::all();

        return view('user.video_list',compact('videos','therapist'));
    }

    public function SearchVideos(Request $request, $type)
    {
        $searchTerm = $request->query('name');
        $videos = Video::where('title','like', "%{$searchTerm}%")->latest()->get();

        if($type == 'titles' || $type == 'inline')
            {
                if($videos->count() > 0)
                    {
                        return response()->json([
                            'success' => true,
                            'videos' => $videos,
                        ]);
                    }
                else
                    {
                        return response()->json([
                            'success' => true,
                            'message' => 'no matching video found',
                        ]);
                    }
            }
        if($type == 'full_page')
            {
                return view('user.search_video', compact('videos'));
            }
    }

    public function WatchVideo($id)
    {
        $video = Video::find($id);
        if(!$video)
            {
                return redirect('user/videos');
            }
        $video->increment('view_count');
        $video->save();

        $user = User::where('user_type','user')
            ->orWhere('user_type','therapist')
            ->get();

        $therapist = Therapist::all();
        $comments = VideoComment::where('video_id',$video->id)->get();
        $replies = VideoCommentReply::all();

        $other_videos = Video::where('id','!=',$id)->latest()->get();

        return view('user.watch_video', compact('video','user','therapist','comments','replies','other_videos'));
    }

    public function LikeVideo($id)
    {
        $video = Video::find($id);
        $video->increment('like_count');
        $video->save();

        return response()->json([
            'success' => true,
            'message' => "Video liked successfully!",
        ]);
    }

    public function CommentOnVideo(Request $request, $id)
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

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
        $client = Client::where('email',$user->email)->first();

        $reply = new VideoCommentReply;
        $reply->user_id = $user->id;
        $reply->comment_id = $id;
        $reply->reply = $request->reply;
        $reply->save();

        return redirect()->back();
    }

    public function Books()
    {
        $books = Book::latest()->get();
        $therapist = Therapist::all();

        return view('user.book_list', compact('books','therapist'));
    }

    public function SearchBooks(Request $request)
    {
        $searchTerm = $request->query('name');
        $books = Book::where('title','like', "%{$searchTerm}%")
                ->orWhere('details','like', "%{$searchTerm}%")
                ->latest()->get();

        if($books->count() > 0)
            {
                return response()->json([
                    'success' => true,
                    'books' => $books,
                ]);
            }
        else
            {
                return response()->json([
                    'success' => true,
                    'message' => 'no matching book found',
                ]);
            }
    }

    public function ReadBook($id)
    {
        $book = Book::find($id);
        if(!$book)
            {
                return redirect('user/books');
            }
        $book->increment('read_count');
        $book->save();

        $user = User::where('user_type','user')
        ->orWhere('user_type','therapist')
        ->get();

        $therapist = Therapist::where('id',$book->therapist_id)->first();

        $comments = BookComment::where('book_id',$book->id)->get();
        $replies = BookCommentReply::all();

        return view('user.read_book', compact('book','user','therapist', 'comments', 'replies'));
    }

    public function LikeBook($id)
    {
        $book = Book::find($id);
        $book->increment('like_count');
        $book->save();

        return response()->json([
            'success' => true,
            'message' => "Book liked successfully!",
        ]);
    }

    public function CommentOnBook(Request $request, $id)
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $comment = new BookComment;
        $comment->user_id = $user->id;
        $comment->book_id = $id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back();
    }

    // 0986484058
    public function ReplyOnBookComment(Request $request, $id)
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $reply = new BookCommentReply;
        $reply->user_id = $user->id;
        $reply->comment_id = $id;
        $reply->reply = $request->reply;
        $reply->save();

        return redirect()->back();
    }

    public function Appointments()
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $appointments = Appointment::where('client_id',$client->id)->get();
        $therapists = Therapist::all();
        return view('user.appointments',compact('appointments','therapists'));
    }

    public function Appointment($id)
    {
        $appointment = Appointment::find($id);

        $therapist = Therapist::where('id',$appointment->therapist_id)->first();

        $rating = Review::all();

        return view('user.appointment', compact('appointment','therapist','rating'));
    }

    public function NewAppointment()
    {
        $therapists = Therapist::all();
        $rating = Review::all();

        return view('user.new_appointment', compact('therapists', 'rating'));
    }

    public function PostNewAppointment(Request $request)
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $appointment = new Appointment;

        $appointment->client_id = $client->id;
        $appointment->therapist_id = $request->therapist_id;
        $appointment->topic = $request->topic;
        $appointment->date_and_time = $request->date_and_time;
        $appointment->status = 'pending';
        $appointment->save();

        return redirect('user/appointments');
    }

    public function CancelAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'cancelled';
        $appointment->save();

        return redirect()->back();
    }

    public function Progress()
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $chats = Chat::where('client_id',$client->id)->get();
        $therapists = Therapist::all();
        $myPosts = Post::where('user_id',$user->id)->get();
        $postComments = PostComment::where('user_id',$user->id)->get();
        $videoComments = VideoComment::where('user_id',$user->id)->get();
        $bookComments = BookComment::where('user_id',$user->id)->get();

        return view('user.progress', compact(
            'client','chats','therapists',
            'myPosts','postComments',
            'videoComments','bookComments'
        ));
    }

    public function generateProgressReport()
    {
        $user = Auth::user();
        $client = Client::where('email',$user->email)->first();

        $chats = Chat::where('client_id',$client->id)->get(); $therapists = Therapist::all();

        $posts = Post::where('user_id',$user->id)->get(); $comments = PostComment::all();

        $view_file = 'user.report_progress'; $compact_list = ['client', 'chats', 'therapists', 'posts', 'comments'];

        $date = Carbon::today()->format('d M Y'); $file_name = "Kuhes Care - Progress Report for ".

        $client->first_name." ". $client->last_name .".pdf";

        $dompdf = new Dompdf(); $view = view($view_file, compact($compact_list));

        $dompdf->loadHtml($view->render()); $dompdf->setPaper('A4', 'portrait');

        $dompdf->render(); $output = $dompdf->output();

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment;filename='.$file_name,
        ];

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $file_name, $headers);
    }

    public function NewSubscription(Request $request)
    {
        if(Auth::check())
            {
                $user = Auth::user();
                $client = Client::where('email',$user->email)->first();

                $time = Carbon::now();
                $month_name = $time->monthName;

                $pay = new Payment;
                $pay->name = $client->first_name. ' '. $client->last_name."'s ". $month_name . "'s subcription";
                $pay->client_id = $client->id;
                $pay->amount = $request->amount;
                $pay->method = $request->method;
                $pay->trans_id = $request->trans_id;
                $pay->save();

                $client = Client::find($client->id);
                $client->sub_exp_date = $time->addDays(30);
                $client->save();

                return redirect('user/dashboard');
            }
        else
            {
                return redirect('login');
            }
    }
}
