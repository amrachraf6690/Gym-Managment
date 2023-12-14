@extends('coach.layout.app')
@section('title', 'All Trains')
@section('content')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-primary">Trains</h6>
                                <a href="{{route('coach.trains.unconfirmed')}}" class="btn btn-primary">Confirm Train</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Train</th>
                                            <th>Trainee</th>
                                            <th>Time</th>
                                            <th>Confirmed</th>
                                            <th>Date</th>
                                            <th style="width: 20px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Train</th>
                                            <th>Trainee</th>
                                            <th>Time</th>
                                            <th>Confirmed</th>
                                            <th>Date</th>
                                            <th style="width: 20px">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($trains as $train)
                                        <tr>
                                            <td>{{$train->name}}</td>
                                            <td>{{$train->user->name}}</td>
                                            <td>{{$train->time}}</td>
                                                @if($train->confirmed == 1)
                                            <td class="bg-success text-white text-center">YES</td>
                                            <td>{{$train->created_at->diffForHumans()}}</td>
                                            <td>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{route('coach.trains.delete', ['id' => $train->id])}}">Delete</a>
                                                    </form>
                                                </div>
                                            </div>
                                            </td>
                                                @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            <td>{{$train->created_at->diffForHumans()}}</td>
                                            <td>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{route('coach.trains.confirm', ['id' => $train->id])}}">Confirm</a>
                                                    <a class="dropdown-item" href="{{route('coach.trains.delete', ['id' => $train->id])}}">Delete</a>
                                                </div>
                                            </div>
                                            </td>
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