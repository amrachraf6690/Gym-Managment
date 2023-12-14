@extends('trainee.layout.app')
@section('title', 'All Trains')
@section('content')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-primary">Trains</h6>
                                <p class="btn btn-primary">{{$trains->count()}} Trains - {{$trains->sum('time')}} Minutes</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Train</th>
                                            <th>Time</th>
                                            <th>Confirmed</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Train</th>
                                            <th>Time</th>
                                            <th>Confirmed</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($trains as $train)
                                        <tr>
                                            <td>{{$train->name}}</td>
                                            <td>{{$train->time}}</td>
                                                @if($train->confirmed == 1)
                                            <td class="bg-success text-white text-center">YES</td>
                                            <td>{{$train->created_at->diffForHumans()}}</td>
                                                @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            <td>{{$train->created_at->diffForHumans()}}</td>
                                                @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection