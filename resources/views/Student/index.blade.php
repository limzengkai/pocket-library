@extends('layouts.layout')

@section('sidebar')
<ul class="navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item"><a class="nav-link active mt-4" href="{{route('student.dashboard')}}"><i
                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('student.profile')}}"><i
                class="fas fa-user"></i><span>Profile</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('student.attendance')}}"><i
                class="fas fa-table"></i><span>Attendance</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('nilam.index')}}"><i
                class="fas fa-book"></i><span>Nilam</span></a></li>
</ul>
@endsection

        @section('content')
            
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Student Dashboard</h3>
                        {{-- Generate Report --}}
                        {{-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i
                                class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                                <span>Total Nilam (Approved)</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$countApproved}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                                <span>Nilam (Rejected)</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$countreject}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Nilam (Pending)
                                                    </span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$countpending}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fa fa-spinner" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1">
                                                <span>Nilam Ranking</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span>
                                                    @foreach ($rank as $ranks)                                                        
                                                        {{$ranks->rank}}  &nbsp; / &nbsp; {{$total}}
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fa fa-trophy" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Nilam Submission (Monthly)</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;,&quot;Sep&quot;,&quot;Oct&quot;,&quot;Nov&quot;,&quot;Dec&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Nilams&quot;,&quot;fill&quot;:true,&quot;data&quot;:
                                        [&quot;{{$months['Jan']}}&quot;,&quot;{{$months['Feb']}}&quot;,&quot;{{$months['Mar']}}&quot;,&quot;{{$months['Apr']}}&quot;,&quot;{{$months['May']}}&quot;,&quot;{{$months['Jun']}}&quot;,&quot;{{$months['Jul']}}&quot;,&quot;{{$months['Aug']}}&quot;,&quot;{{$months['Sep']}}&quot;,&quot;{{$months['Oct']}}&quot;,&quot;{{$months['Nov']}}&quot;,&quot;{{$months['Dec']}}&quot;]
                                        ,&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.059)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas></div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Nilam Ranking</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Total Nilam</th>
                                                <th>Rank</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ranking as $rankings)
                                            <tr>
                                                <td>{{$rankings->Name}}</td>
                                                <td>{{$rankings->total_nilam}}</td>
                                                <td>{{$rankings->rank}}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                        {{$ranking->links()}}
                                </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-5 col-xl-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="text-primary fw-bold m-0">Announcement</h6>
                                    </div>
                                    @foreach ($announcement as $announcements)
                                    <div class="card-body row">

                                            <h4>
                                                <strong>
                                                    {{$announcements->title}}
                                                </strong>
                                            </h4>
                                            <p>
                                                {{$announcements->description}}
                                            </p>
                                            <p class="mt-1">
                                                <small>{{$announcements->created_at}}</small>
                                            </p>

                                        <hr>
                                    </div>
                                    @endforeach
                                    {{$announcement->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endsection
