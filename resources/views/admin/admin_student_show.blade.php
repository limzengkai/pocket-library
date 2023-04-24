@extends('admin.admin_layout')
        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4" href="{{route('admin.dashboard')}}"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item">
                <a class="nav-link active" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
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
                    <div>
                        <a href="{{route('student.index')}}" style="text-decoration: none"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i> &nbsp; Go Back</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Nilam Viewing</p>
                        </div>
                        <div class="card-body p-5">
                            <h2 class="text-primary fw-bold text-center mt-3">Nilam</h2>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                            
                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <strong>
                                            <h3>Information</h3>
                                        </strong>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $student->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $student->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $student->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Passowrd</th>
                                            <td>{{ $student->password }}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection