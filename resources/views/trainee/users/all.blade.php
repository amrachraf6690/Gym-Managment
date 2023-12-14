@extends('coach.layout.app')
@section('title', 'All Users')
@section('content')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                            <a href="{{route('coach.users.add')}}" class="btn btn-primary">Add User</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Payment Day</th>
                                            <th>Trains</th>
                                            <th style="width: 20px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Payment Day</th>
                                            <th>Trains</th>
                                            <th style="width: 20px">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td><a href="tel:+2{{$user->mobile}}">{{$user->mobile}}</a></td>
                                            <td>{{$user->payment_day}}/{{$next_month}}</td>
                                            <td>{{$user->trains->count()}}</td>
                                            <td>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{route('coach.users.edit', ['id' => $user->id])}}">Edit</a>
                                                    <a class="dropdown-item" href="{{route('coach.users.delete', ['id' => $user->id])}}">Delete</a>
                                                    <a class="dropdown-item" href="{{route('coach.trains.user', ['id' => $user->id])}}">Trains</a>
                                                    <a class="dropdown-item" href="{{route('coach.users.delete', ['id' => $user->id])}}">Send Message</a>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection