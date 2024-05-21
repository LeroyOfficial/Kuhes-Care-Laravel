<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Models\Client;
use App\Models\Therapist;
use App\Models\Chat;
use App\Models\Message;

use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostCommentReply;

use App\Models\Book;
use App\Models\BookComment;
use App\Models\BookCommentReply;

use App\Models\Video;
use App\Models\VideoComment;
use App\Models\VideoCommentReply;

use App\Models\Payment;

use Carbon\Carbon;

use PDF;
use Dompdf\Dompdf;

class AdminController extends Controller
{
    //
    public function index()
    {
        $therapist_three = Therapist::latest()->take(3)->get();
        $therapists = Therapist::all();
        $chat_count = Chat::count();
        $client = Client::all();
        $clients = $client;
        $peer_posts = Post::take(5)->get();

        return view('admin.home', compact('therapists','therapist_three','client','clients','chat_count','peer_posts'));
    }

    public function Clients()
    {
        $clients = Client::all();

        return view('admin.clients', compact('clients'));
    }

    public function Client($id)
    {
        $client = Client::find($id);

        $therapists = Therapist::all();

        $chats = Chat::where('client_id',$client->id)->get();

        $user = User::where('email',$client->email)->first();
        $posts = Post::where('user_id',$user->id)->get();

        return view('admin.client_details', compact('client','therapists','chats','posts'));
    }

    public function Therapists()
    {
        $therapists = Therapist::all();

        return view('admin.therapists', compact('therapists'));
    }

    public function Therapist($id)
    {
        $therapist = Therapist::find($id);
        $therapist_account = User::where('email',$therapist->email)->first();
        if(!$therapist)
            {
                return redirect('user/therapists');
            }

        $videos = Video::where('therapist_id',$therapist->id)->get();
        $books = Book::where('therapist_id',$therapist->id)->get();
        $time = Carbon::now();

        $therapist_last_seen = Carbon::parse($therapist_account->last_seen);
        $therapist_online = false;

        if(Carbon::now()->diffInMinutes($therapist_last_seen) < 2)
            {
                $therapist_online = true;
            }

        return view('admin.therapist_details', compact('therapist','videos','books','therapist_online','therapist_last_seen','time'));
    }

    public function NewTherapist()
    {
        return view('admin.new_therapist');
    }

    public function PostNewTherapist(Request $request)
    {
        // $id = IdGenerator::generate(['table' => 'therapists', 'length' => 5, 'prefix' =>'T-']);

        $therapist = new Therapist;

        // $therapist->id = $id;
        $therapist->first_name = $request->first_name;
        $therapist->last_name = $request->last_name;
        $therapist->date_of_birth = $request->date_of_birth;
        $therapist->gender = $request->gender;
        $therapist->phone_number = $request->phone_number;
        $therapist->email = $request->email;
        $therapist->about = $request->about;
        $therapist->qualification = $request->qualification;
        $therapist->experience = $request->experience;

        $image = $request->image;

        if($image)
            {
                $imagename = 'TherapistPic'.'-'.$therapist->first_name.' '.
                                $therapist->last_name.'_Profile_Picture_'.time().'.'.$image->getClientoriginalExtension();
                $image->move('Therapist_Pics',$imagename);
                $therapist->image_url = $imagename;
            }

        $therapist->save();

        $therapist_account = new User;
        $account = $therapist_account;
        $account->name = $request->first_name.' '.$request->last_name;
        $account->user_type = 'therapist';
        $account->phone_number = $request->phone_number;
        $account->email = $request->email;
        $account->last_seen = Carbon::now();
        $account->password = Hash::make($request->password);

        $account->save();

        return redirect('admin/therapists')->with('message','New Therapist Added successfully');
    }

    public function PeerPosts()
    {
        $posts = Post::latest()->get();
        $client = Client::all();
        $user = User::where('user_type','user')
            ->orWhere('user_type','therapist')
            ->get();

        $comments = PostComment::all();
        return view('admin.peer_posts', compact('posts', 'user', 'client','comments'));
    }

    public function Payments()
        {
            $clients = Client::all();

            $payments = Payment::all();

            $total_amount = Payment::sum('amount');

            return view('admin.payments', compact('clients','payments','total_amount'));
        }

    public function generateReport($type, $id,$duration)
    {
        $carbon = Carbon::now();

        $endDate = Carbon::now();

        $date = Carbon::today()->format('d M Y');

        if($duration == 'today')
        {
            $startDate = Carbon::today();
        }
        if($duration == 'weekly')
        {
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
        }
        if($duration == 'monthly')
        {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
        }

        if($type == 'all_clients')
        {
            $clients = Client::all();

            $view_file = 'admin.report_all_clients';
            $compact_list = ['clients'];

            $file_name = "Kuhes Care - all clients report - ".$date.".pdf";

        }

        if($type == 'client' && $id)
        {
            $client = Client::find($id);

            if($duration == 'all')
            {
                $startDate = $client->created_at;
            }

            $chats = Chat::
                where('client_id',$client->id)
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<', $endDate)
                ->get();

            $therapists = Therapist::all();

            $user = User::where('email',$client->email)->first();

            $posts = Post::
                where('user_id',$user->id)
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<', $endDate)
                ->get();

            $comments = PostComment::all();

            $view_file = 'admin.report_client';
            $compact_list = [
                'client', 'chats', 'therapists', 'posts', 'comments','duration','startDate','endDate'
                ];

            $file_name = "Kuhes Care - ".$duration." client Report for ". $client->first_name." ". $client->last_name ." - ".$date.".pdf";
        }

        if($type == 'all_therapists')
        {
            $therapists = Therapist::all();

            $chats = Chat::all();

            $videos = Video::all();

            $books = Book::all();

            $view_file = 'admin.report_all_therapists';

            $compact_list = [
                'therapists', 'chats', 'books','videos'
                ];

            $file_name = "Kuhes Care - All Therapists Report - ".$date.".pdf";
        }

        if($type == 'therapist' && $id)
        {
            $therapist = Therapist::find($id);

            if($duration == 'all')
            {
                $startDate = $therapist->created_at;
            }

            $chats = Chat::
                where('therapist_id',$therapist->id)
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<', $endDate)
                ->get();

            $videos = Video::
                where('therapist_id',$therapist->id)
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<', $endDate)
                ->get();

            $video_comments = VideoComment::all();


            $books = Book::
                where('therapist_id',$therapist->id)
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<', $endDate)
                ->get();

            $book_comments = BookComment::all();

            $view_file = 'admin.report_therapist';

            $compact_list = [
                'therapist', 'chats', 'book_comments',
                'video_comments','books','videos',
                'duration','startDate','endDate'
                ];

            $file_name = "Kuhes Care - ".$duration." Therapist Report for". $therapist->first_name." ". $therapist->last_name ." - ".$date.".pdf";
        }

        if($type == 'all_payments')
            {
                $clients = Client::all();

                $payments = Payment::all();

                $total_amount = Payment::sum('amount');

                $view_file = 'admin.report_payments';

                $compact_list = [
                    'clients','payments','total_amount'
                    ];

                $file_name = "Kuhes Care - All Payment - ".$date.".pdf";
            }

        $dompdf = new Dompdf();

        $view = view($view_file,
            compact($compact_list)
            );

        $dompdf->loadHtml($view->render());

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $output = $dompdf->output();

        $date = Carbon::today()->format('d M Y');

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment;filename='.$file_name,
        ];

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $file_name, $headers);

    }
}
