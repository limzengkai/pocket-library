@extends('admin.admin_layout')

        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4 active" href="{{route('admin.dashboard')}}"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item">
                <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
                    <i class="fa fa-user" aria-hidden="true"></i> <span>Profile</span></a>
                <div class="collapse" id="submenu1" aria-expanded="false">
                    <ul class="flex-column pl-2 nav">
                        <li class="nav-item"><a class="nav-link py-0" href="{{route('admin.index')}}">Admin</a></li>
                        <li class="nav-item">
                            <a class="nav-link collapsed py-1" href="{{route('teacher.index')}}">Teacher</a>
                        </li>
                        <li class="nav-item"><a class="nav-link py-0" href="{{route('student.index')}}">Student</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">
                    <i class="fa fa-user" aria-hidden="true"></i> <span>Account Registration</span></a>
                <div class="collapse" id="submenu2" aria-expanded="false">
                    <ul class="flex-column pl-2 nav">
                        <li class="nav-item"><a class="nav-link py-0" href="{{route('admin.register')}}">Admin Registration</a></li>
                        <li class="nav-item"><a class="nav-link py-0" href="{{route('teacher.register')}}">Teacher Registration</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{route('attendance.index')}}"><i
                        class="fas fa-table"></i><span>Attendance</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('booking.index')}}"><i class="fa fa-bookmark" aria-hidden="true"></i><span>Booking</span></a></li>
        </ul>
        @endsection

        @section('content')
            
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-primary mb-0"><b>Admin Dashboard</b> </h3>
                    </div>
                    <div class="row">

                        <div class="col mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                                <span>Total Room Booking (Pending)</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span>
                                                    {{$countPending}}
                                                </span>
                                            
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1">
                                                <span>Total Room Booking (Approved)</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span>
                                                    {{$countApproved}}
                                                </span>
                                            
                                            </div>
                                        </div>
                                        <div class="col-auto"><i
                                                class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Total Room Booking (Rejected)</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$countRejected}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Total number of Room Booking (Monthly)</h6>

                                </div>
                                <div class="chart-area">
                                    <canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;,&quot;Sep&quot;,&quot;Oct&quot;,&quot;Nov&quot;,&quot;Dec&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Booking&quot;,&quot;fill&quot;:true,&quot;data&quot;:
                                    [&quot;{{$months['Jan']}}&quot;,&quot;{{$months['Feb']}}&quot;,&quot;{{$months['Mar']}}&quot;,&quot;{{$months['Apr']}}&quot;,&quot;{{$months['May']}}&quot;,&quot;{{$months['Jun']}}&quot;,&quot;{{$months['Jul']}}&quot;,&quot;{{$months['Aug']}}&quot;,&quot;{{$months['Sep']}}&quot;,&quot;{{$months['Oct']}}&quot;,&quot;{{$months['Nov']}}&quot;,&quot;{{$months['Dec']}}&quot;]
                                    ,&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.059)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas></div>

                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Room Booking</h6>

                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;
                                            :[&quot;Room A&quot;,&quot;Room B&quot;,&quot;Room C&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;
                                            :[&quot;{{$rooms['roomA']}}&quot;,&quot;{{$rooms['roomB']}}&quot;,&quot;{{$rooms['roomC']}}&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}">
                                        </canvas>
                                    </div>
                                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Room A</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Room B</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Room C</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div>
                                <div class="row-lg-3">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary fw-bold m-0">Room Booking</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                            aria-describedby="dataTable_info">
                                            <table class="table my-0" id="dataTable">
                                                @foreach ($date as $dates)
                                                <thead>
                                                    <tr>
                                                        <th>{{$dates->bookingdate}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Room</th>
                                                        <th>Time In</th>
                                                        <th>Time Out</th>
                                                        <th>Status</th>
                                                    </tr>
                                                       
                                                        @foreach ($booking as $bookings)
                                                            @if ( $dates->bookingdate == $bookings->bookingdate)
                    
                                                                <tr>
                                                                    <td>{{$bookings->name}}</td>
                                                                    <td>{{$bookings->room}}</td>
                                                                    <td>{{$bookings->TimeIn}}</td>
                                                                    <td>{{$bookings->TimeOut}}</td>
                                                                    <td>{{$bookings->status}}</td>
                                                                </tr>                     
                    
                                                            @endif
                    
                                                            @endforeach
                                                </tbody>
                    
                                                @endforeach
                    
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-lg-3">
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
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Announcement</h6>
                                    <a class="btn" href="{{route('announcement.create')}}">
                                        <i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </a>
                                </div>
                                @foreach ($announcement as $announcements)
                                <div class="card-body row">
                                    <div class="col">
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
                                    </div>
                                    <div class="col-sm-2">
                                        <span>
                                            <a class="btn" href="{{route('announcement.edit', $announcements->id)}}">
                                                <i class="fas fa-edit" aria-hidden=true></i>
                                            </a>
                                        </span>
                                        <span>
                                            <form action="{{route('announcement.destroy', $announcements->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn" name="delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>                     
                                            </form>
                                        </span>
                                    </div>
                                    <hr>
                                </div>
                                @endforeach
                                {{$announcement->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
