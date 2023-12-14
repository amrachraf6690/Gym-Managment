@extends('trainee.layout.app')
@section('content')

@if(0 < ($user->payment_day - date('d')) && ($user->payment_day - date('d')) < 3)
<div class="row">
    <div class="col col-12">
        <button class="btn btn-danger">
            <p>You have to pay before {{$user->payment_day.'/'.date('M')}}
        </button>
    </div>
</div>
@else
    You are okay
@endif

@endsection

