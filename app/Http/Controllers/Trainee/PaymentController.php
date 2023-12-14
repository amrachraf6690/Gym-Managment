<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function all(){
        $payments = Payment::where('user_id',auth()->id())->firstorfail();
        return view('trainee.payments.all',compact('payments'));
    }
}
