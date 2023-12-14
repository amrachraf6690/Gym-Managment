@extends('trainee.layout.app')
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
                                                Total Trains</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trains->count()}}</div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$incompleted_trains->count()}}</div>
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
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$trains_today->count()}}</div>
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
                                                Messages From Coach</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$messages}}</div>
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
                        <div class="col-xl-6 col-lg-6">
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
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Completed & Incompleted Trains</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <div id="container" style="width:100%; height:250px;"></div>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <a class="mr-2 btn btn-primary" href="{{route('trainee.trains.add')}}"> Add Train
                                        </a>
                                    </div>
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
const InCompletedCount = {{$incompleted_trains->count()}};
const CompletedCount = {{$trains->count()-$incompleted_trains->count()}};
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

</script>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Trains By Day'
    },
    subtitle: {
        text: 'For Last 4 days'
    },
    xAxis: {
        categories: [
            'Today',
            'Yesterday',
            '{{today()->subDays(2)->diffForHumans()}}',
            '{{today()->subDays(3)->diffForHumans()}}'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Trains'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Trains',
        data: [{{$trains_today->count()}},{{$trains_yesterday->count()}},{{$trains_first_yesterday->count()}},{{$trains_before_yesterday->count()}}],
        },{
        name: 'Minutes',
        data: [{{$trains_today->sum('time')}},{{$trains_yesterday->sum('time')}},{{$trains_first_yesterday->sum('time')}},{{$trains_before_yesterday->sum('time')}}]
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
</script>
@endsection