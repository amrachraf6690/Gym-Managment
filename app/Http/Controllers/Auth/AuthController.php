<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function auth(LoginRequest $request){
        if(auth()->attempt($request->except('_token'))){
            if(auth()->user()->role == 0){
                return redirect()->route('trainee.home')->with(['success'=>'Welcome Back']);
            }else{
                return redirect()->route('coach.home')->with(['success'=>'Welcome Back']);
            }
        }
        return redirect()->back()->withErrors(['worng'=>'Envalid ID/Password'])->withInput();

    }

    public function logout(){
        return auth()->user();
    }
}
