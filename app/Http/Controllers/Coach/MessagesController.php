<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function add(){
        $users = User::where('id', '!=', 1)->get();
        return view('coach.messages.add',compact('users'));
    }
    
    public function store(Request $request){
        if($request->user_id == 'all'){
            foreach (User::where('id', '!=', 1)->get() as $user) {
                Message::create([
                    'message'=>$request->message,
                    'from_user_id'=>auth()->id(),
                    'to_user_id'=>$user->id,
                ]);
            }
        $users_count = User::all()->count()-1;
        return redirect()->route('coach.home')->with(['success'=>'Message is sent for all trainees ('.$users_count.')']);
        }else{
            Message::create([
                'message'=>$request->message,
                'from_user_id'=>auth()->id(),
                'to_user_id'=>$request->user_id,
            ]);
        return redirect()->route('coach.home')->with(['success'=>'Message is sent for the user']);
        }
    }


    public function from_users(){
        $messages = Message::where('to_user_id',auth()->id())->with('fromUser')->with('toUser')->orderBy('created_at', 'desc')->get();
        return view('coach.messages.from_users',compact('messages'));
    }


    public function all(){
        $messages =  Message::where('from_user_id',auth()->id())->with('fromUser')->with('toUser')->orderBy('created_at', 'desc')->get();
        return view('coach.messages.all',compact('messages'));
    }
}
