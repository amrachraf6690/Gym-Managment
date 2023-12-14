@extends('coach.layout.app')
@section('title', 'Add User')
@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="p-5">
                    <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><i class="fa-regular fa-user"></i> Add User!</h1>
            </div>
            <form class="user" method="POST" action="">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror form-control-user" placeholder="Name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <input name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror form-control-user" placeholder="Mobile" value="{{old('mobile')}}">
                </div>

                <div class="form-group">
                    <input name="payment_day" type="text" class="form-control @error('payment_day') is-invalid @enderror form-control-user" placeholder="Payment Day" value="{{old('payment_day')}}">
                </div>

                <div class="form-group">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-user" placeholder="Passowrd" value="{{old('password')}}">
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Add User
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