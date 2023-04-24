@extends('layouts.tlayout')
    @section('sidebar')
    <ul class="navbar-nav text-light" id="accordionSidebar">
        <li class="nav-item"><a class="nav-link mt-4" href="{{route('teacher.dashboard')}}"><i
                    class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('teacher.profile')}}"><i
                    class="fas fa-user"></i><span>Profile</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('teacher.attendance')}}"><i
                    class="fas fa-table"></i><span>Attendance</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('tnilam.index')}}"><i
                    class="fas fa-book"></i><span>Nilam</span></a></li>
        <li class="nav-item"><a class="nav-link active" href="{{route('teacher.booking')}}">
            <i class="fa fa-bookmark" aria-hidden="true"></i><span>Booking</span></a></li>
    </ul>
    @endsection
        @section('content')
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-primary m-0 fw-bold">Library Room Booking System</h1>
            </div>
            <div>
                <a href="{{route('teacher.booking')}}" style="text-decoration: none"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i> &nbsp; Go Back</a>
            </div>
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Booking List</p>
                </div>
                <div class="card-body p-5">
                        <table class="table my-0" id="dataTable">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th>Booking Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th>Status</th>
                                </tr>
                                    @foreach ($booking as $bookings)

                                            <tr>
                                                <td>{{$bookings->name}}</td>
                                                <td>{{$bookings->room}}</td>
                                                <td>{{$bookings->bookingdate}}</td>
                                                <td>{{$bookings->TimeIn}}</td>
                                                <td>{{$bookings->TimeOut}}</td>
                                                <td>
                                                    @if ($bookings->status == "Rejected")
                                                            <button type="button" class="btn btn-danger">
                                                                <b>Rejected &nbsp;</b>
                                                            </button>   

                                                    @elseif($bookings->status == "Approved") 
                                                    <button type="button" class="btn btn-success">
                                                        <b>Approved</b>
                                                    </button>

                                                    @elseif($bookings->status == "Pending")
                                                    <button type="button" class="btn btn-primary">
                                                        <b>Pending &nbsp;</b>
                                                    </button>
                                                    


                                                </td>
                                            </tr>                     

                                        @endif

                                        @endforeach
                            </tbody>



                        </table>

                </div>

            </div>
            </div>
        </div>
        
        @endsection