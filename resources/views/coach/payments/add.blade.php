@extends('coach.layout.app')
@section('title', 'Add Payment')
@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="p-5">
                    <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><i class="fa-solid fa-money-bill-wave"></i> Add Payment!</h1>
            </div>
            <form class="user" method="POST" action="">
                @csrf
                <div class="form-group">
                    <span>Month</span>
                    <select id="month" name="month" class="form-control">
                        <option value="all">All</option>
                        <option value="nov">November</option>
                        <option value="dec">December</option>
                        <option value="jan">January</option>
                        <option value="feb">February</option>
                    </select>
                </div>
                <div class="form-group">
                <span>User</span>
                <select id="user_id" name="user_id" class="form-control">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Add Message
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