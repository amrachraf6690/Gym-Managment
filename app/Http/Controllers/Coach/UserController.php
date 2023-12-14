<?php

namespace App\Http\Controllers\Coach;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAddUser;
use App\Http\Requests\ValidateEditUser;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(){
        return view('coach.users.add');
    }



    public function store(ValidateAddUser $request){
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->toArray());
        Payment::create(['user_id'=>$user->id]);
        return redirect()->route('coach.home')->with(['success'=>'User '.$user->name.' Created.','user'=>'User Id for '.$user->name.' is : '.$user->id]);
    }



    public function users(){
        $next_month = Carbon::now()->addMonth()->format('m/Y');
        $users =  User::with('trains')->where('id', '!=', 1)->get();
        return view('coach.users.all',compact('users','next_month'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('coach.users.edit',compact('user'));
    }

    public function update(ValidateEditUser $request,$id){
        User::find($id)->update($request->toArray());
        $user = User::find($id);
        return redirect()->route('coach.home')->with(['success'=>'User '.$user->name.' Updated Successfully.']);
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('coach.home')->with(['success'=>'User Deleted Successfully.']);
    }
}
