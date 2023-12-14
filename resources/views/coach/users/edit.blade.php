@extends('coach.layout.app')
@section('title', 'Edit '.$user->name)
@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit {{$user->name}}!</h1>
            </div>
            <form class="user" method="POST" action="">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror form-control-user" placeholder="Name" value="{{$user->name}}">
                </div>

                <div class="form-group">
                    <input name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror form-control-user" placeholder="Mobile" value="{{$user->mobile}}">
                </div>

                <div class="form-group">
                    <input name="payment_day" type="text" class="form-control @error('payment_day') is-invalid @enderror form-control-user" placeholder="Payment Day" value="{{$user->payment_day}}">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Edit {{$user->name}}
                </button>
                
            </form>
            <hr>
        </div>
    </div>
</div>

    @if ($errors->any())
        <!-- Toastify Script -->
        <script src="{{asset('js/toastify.js')}}"></script>
        @foreach ($errors->all() as $error)
        <script>
        Toastify({
            text: "{{$error}}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "center",
            backgroundColor: "linear-gradient(to right, #FF5733, #D90000)",
        }).showToast();
        </script>
        @endforeach
    @endif
@endsection