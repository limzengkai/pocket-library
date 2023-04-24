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
            <li class="nav-item"><a class="nav-link" href="{{route('attendance.index')}}"><i
                        class="fas fa-table"></i><span>Attendance</span></a></li>
            <li class="nav-item active"><a class="nav-link" href="{{route('booking.index')}}"><i class="fa fa-bookmark" aria-hidden="true"></i><span>Booking</span></a></li>
        </ul>
        @endsection
        @section('content')
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-primary m-0 fw-bold">Library Room Booking System</h1>
            </div>
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Booking List</p>
                </div>
                <div class="card-body p-5">
                    <a href="{{route('booking.create')}}">
                        <button type="button" class="btn btn-warning mb-3 p-2">
                            <b>
                                View All Record
                            </b>
                        </button>
                    </a>
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
                                    <th>Action</th>
                                </tr>
                                   
                                    @foreach ($booking as $bookings)
                                        @if ( $dates->bookingdate == $bookings->bookingdate)

                                            <tr>
                                                <td>{{$bookings->name}}</td>
                                                <td>{{$bookings->room}}</td>
                                                <td>{{$bookings->TimeIn}}</td>
                                                <td>{{$bookings->TimeOut}}</td>
                                                <td>{{$bookings->status}}</td>
                                                <td>
                                                    @if ($bookings->status == "Pending")
                                                    <div class="d-flex flex-row">
                                                        <form action="{{route('booking.update', $bookings->id)}}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger mx-2">
                                                                Rejected
                                                            </button>   
                                                            <input name="status" type="hidden" value="Rejected" >
                                                        </form>    
                                                        
                                                        <form action="{{route('booking.update', $bookings->id)}}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Approved</button>
                                                            <input name="status" type="hidden" value="Approved" hidden>
                                                        </form>
                                                    </div>

                                                    @elseif($bookings->status == "Approved") 
                                                        <form action="{{route('booking.update', $bookings->id)}}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                Rejected
                                                            </button>   
                                                            <input name="status" type="hidden" value="Rejected" hidden>
                                                        </form>
        
                                                    @elseif($bookings->status == "Rejected")
                                                        <form action="{{route('booking.update', $bookings->id)}}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Approved</button>
                                                            <input name="status" type="hidden" value="Approved" hidden>
                                                        </form>
                                                    
                                                    @endif


                                                </td>
                                            </tr>                     

                                        @endif

                                        @endforeach
                            </tbody>

                            @endforeach

                        </table>

                </div>

            </div>
            </div>
        </div>
        
        @endsection