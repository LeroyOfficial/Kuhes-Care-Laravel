<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Therapist;
use Carbon\Carbon;

class IsTherapist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->user_type == "therapist")
            {
                $user = User::where('id',Auth::user()->id)->first();
                $user->last_seen = Carbon::now();
                $user->save();

                return $next($request);
            }
        else
            {
                return redirect('/login');
            }
    }
}
