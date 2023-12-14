<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class TrainsController extends Controller
{
    public function add(){
        return view('trainee.trains.add');
    }

    public function store(Request $request){
        Train::create([
            'user_id'=>auth()->id(),
            'name'=>$request->name,
            'time'=>$request->time,
            'confirmed'=>0,
        ]);
        return redirect()->route('trainee.home')->with(['success'=>'Train added successfully. Ask admin to confirm it']);
    }

    public function all(){
        $trains =  Train::where('user_id',auth()->id())->orderBy('created_at', 'desc')->get();
        return view('trainee.trains.all',compact('trains'));
    }
}
