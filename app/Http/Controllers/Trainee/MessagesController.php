<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function add(){
        return view('trainee.messages.add');
    }

    public function store(Request $request){
        $coaches = User::where('role',1)->get();
        foreach ($coaches as $coach){
            Message::create([
                'from_user_id'=>auth()->id(),
                'to_user_id'=>$coach->id,
                'message'=>$request->message,
            ]);
        };
        return redirect()->route('trainee.home')->with(['success'=>'Message is sent to the coach']);
    }

    public function from_coach(){
        $messages = Message::where('to_user_id',auth()->id())->orderBy('created_at', 'desc')->get();
        return view('trainee.messages.from_coach',compact('messages'));
    }

    public function all(){
        $messages =  Message::where('from_user_id',auth()->id())->with('toUser')->orderBy('created_at', 'desc')->get();
        return view('trainee.messages.all',compact('messages'));
    }
}
