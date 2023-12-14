@extends('trainee.layout.app')
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
                                            <th>November</th>
                                            <th>December</th>
                                            <th>January</th>
                                            <th>February</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>November</th>
                                            <th>December</th>
                                            <th>January</th>
                                            <th>February</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            @if($payments->nov == 1)
                                            <td class="bg-success text-white text-center">Paid</td>
                                            @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            @endif
                                            @if($payments->dec == 1)
                                            <td class="bg-success text-white text-center">Paid</td>
                                            @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            @endif
                                            @if($payments->jan == 1)
                                            <td class="bg-success text-white text-center">Paid</td>
                                            @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            @endif
                                            @if($payments->feb == 1)
                                            <td class="bg-success text-white text-center">Paid</td>
                                            @else
                                            <td class="bg-danger text-white text-center">NO</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection