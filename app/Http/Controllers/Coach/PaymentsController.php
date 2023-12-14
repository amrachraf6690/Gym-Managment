<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function add(){
        $users = User::where('id', '!=', 1)->get();
        return view('coach.payments.add',compact('users'));
    }

    public function store(Request $request){
        $user = User::find($request->user_id);
        if ($request->month === 'all') {
            Payment::where('user_id',$request->user_id)->update([
                'nov' => 1,
                'dec' => 1,
                'jan' => 1,
                'feb' => 1,
            ]);
        return redirect()->route('coach.home')->with(['success'=>'All Months Paid Successfully for '.$user->name]);
        }else{
            Payment::where('user_id',$request->user_id)->update([$request->month => 1]);
            return redirect()->route('coach.home')->with(['success'=>'Month '.$request->month.' Paid Successfully for '.$user->name]);
        };
    }

    public function all(){
        $users = User::where('id', '!=', 1)->with('payments')->get();
        return view('coach.payments.all',compact('users'));
    }
}
