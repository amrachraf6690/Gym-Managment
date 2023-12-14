@extends('trainee.layout.app')
@section('title', 'Add Message')
@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="p-5">
                    <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><i class="fa-regular fa-envelope"></i> Add Message!</h1>
            </div>
            <form class="user" method="POST" action="">
                @csrf
                <div class="form-group">
                    <span>Type</span>
                    <select id="user_id" name="name" class="form-control">
                        <option value="Shoulder">Shoulder</option>
                        <option value="Leg">Leg</option>
                        <option value="Full">Full</option>
                        <option value="BlaBla">BlaBla</option>
                        <option value="Lorem ipsum">Lorem ipsum</option>
                    </select>
                </div>
                <div class="form-group">
                    <span>Time</span>
                    <input type="number" name="time" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Add Train
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