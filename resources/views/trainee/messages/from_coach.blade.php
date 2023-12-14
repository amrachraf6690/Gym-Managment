@extends('trainee.layout.app')
@section('title', 'All Users')
@section('content')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                            <a href="{{route('coach.messages.add')}}" class="btn btn-primary">Send Message</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th>Message</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>From</th>
                                            <th>Message</th>
                                            <th>Time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($messages as $message)
                                        <tr>
                                            <td>{{$message->fromUser->name}}</td>
                                            <td>{{$message->message}}</td>
                                            <td>{{$message->created_at->diffForHumans()}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection