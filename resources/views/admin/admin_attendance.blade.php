@extends('admin.admin_layout')
        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4" href="{{route('admin.dashboard')}}"><i
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
            <li class="nav-item"><a class="nav-link active" href="{{route('attendance.index')}}"><i
                        class="fas fa-table"></i><span>Attendance</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('booking.index')}}"><i class="fa fa-bookmark" aria-hidden="true"></i><span>Booking</span></a></li>
        </ul>
        @endsection

        @section('content')
            <div class="container-fluid">

                <h3 class="text-primary mb-4"><b>Attendance</b> </h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Attendance Record</p>
                    </div>

                    <div class="card-body">
                        <div class="container row py-5 m-auto">
                            <form method="POST" action="{{route('attendance.search')}}" class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="form-group row">
                                                <label for="date" class="col-form-label col-sm-2">Search from</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control input-sm" id="from" name="from" required>
                                                </div>
                                                <label for="date" class="col-form-label col-sm-1">to</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control input-sm" id="to" name="to" required>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="submit" class="btn btn-primary py-0" name="search"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive table mt-2 mx-4 col" id="dataTable" role="grid"
                            aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Time In</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $datas)
                                            <tr>
                                                <td>{{ $datas->Name }}</td>
                                                <td>{{ $datas->date }}</td>
                                                <td>{{ $datas->timein }}</td>
                                            </tr>                                      
                                        @endforeach

                                    </tbody>

                                </table>
                                {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection