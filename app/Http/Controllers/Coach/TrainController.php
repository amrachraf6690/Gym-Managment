<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAddTrain;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function all(){
        $trains =  Train::with('user')->get();
        return view('coach.trains.all',compact('trains'));
    }


    public function unconfirmed(){
        
        $trains =  Train::where('confirmed',0)->with('user')->get();
        return view('coach.trains.all',compact('trains'));
    }

    public function confirm($id){
        Train::find($id)->update(['confirmed'=>1]);
        $train = Train::where('id',$id)->with('user')->first();
        return redirect()->route('coach.home')->with(['success'=>'Train ('.$train->name.') for '.$train->user->name.' confirmed']);
    }

    public function delete($id){
        Train::find($id)->delete();
        return redirect()->route('coach.home')->with(['success'=>'Train Deleted Successfully.']);
    }

    public function user($id){
        $user = User::with('trains')->find($id);
        return view('coach.trains.user',compact('user'));

    }
}
