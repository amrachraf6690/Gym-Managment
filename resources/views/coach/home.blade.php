@extends('coach.layout.app')
@section('title', 'Home Page')
@section('content')
    
@if(session('user'))
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-success">User Data</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample" style="">
        <div class="card-body bg-success text-white">
            {{ session('user') }}
        </div>
    </div>
</div>
@endif

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Trainees</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users_count-1}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-dumbbell fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Incompleted Trains</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$incompleted_trains}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-regular fa-circle-xmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Trainees Today
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$trainees_today}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-calendar-day fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Messages From Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$messages->count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Completed & Incompleted Trains</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <div id="commandes" style="width:100%; height:250px;"></div>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success" style="color: #4e73df !important"></i> Completed
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info" style="color: #1cc88a !important"></i> Incompleted
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="col-xl-8 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Let's do some quick actions</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body align-center align-items-center text-center d-flex p-2">
                                    <div class="col px-4 my-2">
                                        <a href="{{route('coach.users.add')}}" class="mb-2 btn btn-sm btn-success shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Add <small>User</small></a>
                                        <a href="{{route('coach.users.all')}}" class="mb-2 btn btn-sm btn-success shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Edit <small>User</small></a>
                                        <a href="{{route('coach.users.all')}}" class="mb-2 btn btn-sm btn-success shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Delete <small>User</small></a>
                                    </div>
                                    <div class="col px-4 my-2">
                                        <a href="tel:+201063153994" class="mb-2 btn btn-sm btn-warning shadow-sm"><i class="fa-solid fa-phone-flip fa-sm text-white-50"></i> Call <small>Support</small></a>
                                    </div>
                                    <div class="col px-4 my-2">
                                        <a href="{{route('coach.trains.all')}}" class="mb-2 btn btn-sm btn-info shadow-sm"><i class="fa-solid fa-dumbbell fa-sm text-white-50"></i>View <small>Train</small></a>
                                        <a href="{{route('coach.trains.all')}}" class="mb-2 btn btn-sm btn-info shadow-sm"><i class="fa-solid fa-dumbbell fa-sm text-white-50"></i>Confirm <small>Train</small></a>
                                        <a href="{{route('coach.trains.unconfirmed')}}" class="mb-2 btn btn-sm btn-info shadow-sm"><i class="fa-solid fa-dumbbell fa-sm text-white-50"></i>Delete <small>Train</small></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Messages From Users</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <div class="text-center pr-2">
                                        <span>{{$latest_message->message}}</span>
                                    </div>
                                    <div class="text-center text-info pl-2">
                                        {{$latest_message->message}}
                                    </div>
                                    <div class="text-center pl-2">
                                        ({{$latest_message->created_at->diffForHumans()}})
                                    </div>
                                </div><br>                                                               
                                <div class="card-body text-center">
                                    <a href="{{route('coach.messages.from_users')}}" class="d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa-solid fa-angles-left text-white-50"></i> More <i class="fa-solid fa-angles-right text-white-50"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>{{now()}}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
 
       
@endsection
@section('scripts')
const InCompletedCount = {{$incompleted_trains}};
const CompletedCount = {{$completed_trains}};
// Sample data for the chart
const data = [{
    name: 'InCompleted Count',
    y: InCompletedCount,
    color: '#1cc88a'
}, {
    name: 'Completed Count',
    y: CompletedCount,
    color: '#4e73df'
}];

// Create the pie chart
Highcharts.chart('commandes', {
    credits: {
        enabled: false
    },
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: ''
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Number of trains',
        data: data
    }]
});
@if(session('success'))

    Toastify({
    text: "{{ session('success') }}",
    duration: 3000,
    close: true,
    gravity: "top",
    position: "right",
    backgroundColor: "linear-gradient(to right,#00b09b, #96c93d)",
    }).showToast();

@endif
@endsection