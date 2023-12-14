@extends('coach.layout.app')
@section('title', 'All Payments')
@section('content')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Trainee</th>
                                            <th>November</th>
                                            <th>December</th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th style="width: 20px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Trainee</th>
                                            <th>November</th>
                                            <th>December</th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th style="width: 20px">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            @if($user->payments->nov == 1)
                                            <td class="bg-success text-white text-center">Paid</td>
                                            @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            @endif
                                            @if($user->payments->dec == 1)
                                            <td class="bg-success text-white text-center">Paid</td>
                                            @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            @endif
                                            @if($user->payments->jan == 1)
                                            <td class="bg-success text-white text-center">Paid</td>
                                            @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            @endif
                                            @if($user->payments->feb == 1)
                                            <td class="bg-success text-white text-center">Paid</td>
                                            @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            @endif
                                            <td>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{route('coach.payments.add')}}">Pay</a>
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