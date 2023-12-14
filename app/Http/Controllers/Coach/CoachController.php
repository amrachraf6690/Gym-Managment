<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Carbon;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function home(){
        $users_count = User::all()->count();
        $incompleted_trains = Train::whereDate('created_at', today())->where('confirmed',0)->count();
        $trainees_today = Train::whereDate('created_at',today())->with('user')->count();
        $completed_trains = $trainees_today - $incompleted_trains;
        $trainees = Train::latest()->take(3)->orderBy('created_at', 'desc')->get();
        $messages = Message::where('to_user_id',auth()->id())->get();
        $latest_message = Message::latest()->where('to_user_id',auth()->id())->with('fromUser')->take(1)->first();
        return view('coach.home',compact('users_count','incompleted_trains','trainees_today','completed_trains','trainees','messages','latest_message'));
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('coach.login')->withErrors(['worng'=>'You are logged out.']);
    }
}
