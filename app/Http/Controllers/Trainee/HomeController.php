<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $trains = Train::where('user_id',auth()->id())->get();
        $incompleted_trains = Train::where('user_id',auth()->id())->where('confirmed',0)->get();
        $trains_today = Train::where('user_id',auth()->id())->whereDate('created_at',today())->get();
        $trains_yesterday = Train::where('user_id',auth()->id())->whereDate('created_at',today()->subDay())->get();
        $trains_first_yesterday = Train::where('user_id',auth()->id())->whereDate('created_at',today()->subDays(2))->get();
        $trains_before_yesterday = Train::where('user_id',auth()->id())->whereDate('created_at',today()->subDays(3))->get();
        $messages = Message::where('to_user_id',auth()->id())->count();
        return view('trainee.home',compact('trains','incompleted_trains','trains_today','messages','trains_yesterday','trains_first_yesterday','trains_before_yesterday'));
    }
}
