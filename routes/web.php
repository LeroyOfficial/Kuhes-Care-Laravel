<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blogs', function () {
    return view('blogs');
});

Route::get('/our_team', function () {
    return view('our_team');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/dashboard', function () {
    if(Auth::id())
        {
            if(Auth::user()->user_type == 'user')
                {
                    return redirect('/user/dashboard');
                }
            if(Auth::user()->user_type == 'therapist')
                {
                    return redirect('/therapist/dashboard');
                }
            if(Auth::user()->user_type == 'admin')
                {
                    return redirect('/admin/dashboard');
                }
        }
    else
        {
            return redirect('/login');
        }
});

Route::prefix('admin')->middleware('auth','IsAdmin')->group(function() {
	Route::get('dashboard', [AdminController::class,'index']);

    Route::get('dashboard', [AdminController::class,'index']);

    Route::get('clients', [AdminController::class,'Clients']);
    Route::get('client/{id}', [AdminController::class,'Client']);

    Route::get('therapists', [AdminController::class,'Therapists']);
    Route::get('therapist/{id}', [AdminController::class,'Therapist']);
    Route::get('therapist/{id}/edit', [AdminController::class,'EditTherapist']);
    Route::get('therapist/{id}/update', [AdminController::class,'UpdateTherapist']);
    Route::get('new_therapist', [AdminController::class,'NewTherapist']);
    Route::post('post_new_therapist', [AdminController::class,'PostNewTherapist']);

    Route::get('peer_posts', [AdminController::class,'PeerPosts']);

    Route::get('payments', [AdminController::class,'Payments']);

    Route::get('generate_report/{type}', [AdminController::class,'generateReport']);
    Route::get('generate_report/{type}/{user_id}/{duration}', [AdminController::class,'generateReport']);
});

Route::prefix('therapist')->middleware('auth','IsTherapist')->group(function() {
	Route::get('dashboard', [TherapistController::class,'index']);

    Route::get('chats', [TherapistController::class,'Chats']);
    Route::get('chat/{id}', [TherapistController::class,'Chat']);
    Route::get('chat/{id}/fetch_new_messages', [TherapistController::class,'CheckForNewMessages']);
    Route::post('chat/{id}/send_message', [TherapistController::class,'SendMessage']);

    Route::get('peer_chat', [TherapistController::class,'PeerChat']);
    Route::get('peer_chat/post/{id}', [TherapistController::class,'PostDetails']);
    Route::get('peer_chat/post/{id}/like', [TherapistController::class,'LikePost']);
    Route::post('peer_chat/post/{id}/post_comment', [TherapistController::class,'CommentOnPost']);
    Route::post('peer_chat/reply_on_post_comment/{id}', [TherapistController::class,'ReplyOnPostComment']);

    Route::get('books', [TherapistController::class,'Books']);
    Route::get('book/{id}', [TherapistController::class,'BookDetails']);
    Route::get('book/{id}/edit', [TherapistController::class,'EditBook']);
    Route::get('book/{id}/update', [TherapistController::class,'UpdateEditBook']);
    Route::get('new_book', [TherapistController::class,'NewBook']);
    Route::post('post_new_book', [TherapistController::class,'PostNewBook']);

    Route::get('videos', [TherapistController::class,'Videos']);
    Route::get('video/{id}', [TherapistController::class,'VideoDetails']);
    Route::get('video/{id}/edit', [TherapistController::class,'EditVideo']);
    Route::get('video/{id}/update', [TherapistController::class,'UpdateEditVideo']);
    Route::get('new_video', [TherapistController::class,'NewVideo']);
    Route::post('post_new_video', [TherapistController::class,'PostNewVideo']);
    Route::post('video/{id}/post_comment', [TherapistController::class,'CommentonVideo']);
    Route::post('reply_on_video_comment/{id}', [TherapistController::class,'ReplyonVideoComment']);

    Route::get('appointments', [TherapistController::class,'Appointments']);
    Route::get('appointment/{id}', [TherapistController::class,'Appointment']);
    Route::get('approve_appointment/{id}', [TherapistController::class,'ApproveAppointment']);

});

Route::prefix('user')->middleware('auth','IsClient')->group(function() {
	Route::get('dashboard', [UserController::class,'index']);

    Route::get('manage_profile', [UserController::class,'ManageProfile']);

	Route::get('therapists', [UserController::class,'TherapistList']);
	Route::get('search_therapists', [UserController::class,'SearchTherapists']);
	Route::get('therapist/{id}/', [UserController::class,'TherapistDetails']);

    Route::get('new_chat/{id}', [UserController::class,'NewChat']);
    Route::get('chats', [UserController::class,'Chats']);
    Route::get('chat/{id}', [UserController::class,'Chat']);
    Route::get('chat/{id}/fetch_new_messages', [UserController::class,'CheckForNewMessages']);
    Route::post('chat/{id}/send_message', [UserController::class,'SendMessage']);
    Route::post('chat/{id}/video_call', [UserController::class,'VideoCall']);
    Route::post('chat/{id}/voice_call', [UserController::class,'VoiceCall']);
    Route::get('delete_chat/{id}', [UserController::class,'DeleteChat']);

    Route::get('peer_chat', [UserController::class,'PeerChat']);
	Route::get('search_posts/{type}', [UserController::class,'SearchPosts']);
    Route::post('peer_chat/new_post', [UserController::class,'NewPost']);
    Route::get('peer_chat/post/{id}', [UserController::class,'PostDetails']);
    Route::get('peer_chat/post/{id}/like', [UserController::class,'LikePost']);
    Route::post('peer_chat/post/{id}/post_comment', [UserController::class,'CommentOnPost']);
    Route::post('peer_chat/reply_on_post_comment/{id}', [UserController::class,'ReplyOnPostComment']);

    Route::get('videos', [UserController::class,'Videos']);
    Route::get('search_videos/{type}', [UserController::class,'SearchVideos']);
    Route::get('watch_video/{id}', [UserController::class,'WatchVideo']);
    Route::get('video/{id}/like', [UserController::class,'LikeVideo']);
    Route::post('video/{id}/post_comment', [UserController::class,'CommentonVideo']);
    Route::post('reply_on_video_comment/{id}', [UserController::class,'ReplyonVideoComment']);

    Route::get('books', [UserController::class,'Books']);
	Route::get('search_books', [UserController::class,'SearchBooks']);
    Route::get('read_book/{id}', [UserController::class,'ReadBook']);
    Route::get('book/{id}/like', [UserController::class,'LikeBook']);
    Route::post('book/{id}/post_comment', [UserController::class,'CommentOnBook']);
    Route::post('reply_on_book_comment/{id}', [UserController::class,'ReplyonBookComment']);

    Route::get('appointments', [UserController::class,'Appointments']);
    Route::get('appointment/{id}', [UserController::class,'Appointment']);
    Route::get('new_appointment', [UserController::class,'NewAppointment']);
    Route::post('post_new_appointment', [UserController::class,'PostNewAppointment']);
    Route::get('cancel_appointment/{id}', [UserController::class,'CancelAppointment']);

    Route::post('post_review', [UserController::class,'PostReview']);

    Route::get('progress', [UserController::class,'Progress']);

    Route::get('generate_progress_report', [UserController::class,'generateProgressReport']);
});

Route::get('/subscription_expired', function () {
    return view('subscription_expired');
});

Route::post('new_subscription', [UserController::class,'NewSubscription']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });




