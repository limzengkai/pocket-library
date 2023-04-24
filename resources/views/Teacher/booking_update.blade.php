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
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Booking List</p>
                </div>
                <div class="card-body p-5">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th>Date</th>
                                    <th>TimeIn</th>
                                    <th>TimeOut</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($date as $dates)
                                        <th>{{$dates->name}}</th>
                                        <th>{{$dates->room}}</th>
                                        <th>{{$dates->bookingdate}}</th>
                                        <th>{{$dates->TimeIn}}</th>
                                        <th>{{$dates->TimeOut}}</th>
                                        <th>{{$dates->status}}</th>

                                    @endforeach
                                </tr>

                            </tbody>
                        </table>
                        <div class="d-flex flex-row bd-highlight justify-content-center">
                            <div class="mt-5 mb-3 w-25">
                                <a href="/teacher/booking/submit">
                                    <button class="btn bg-danger w-100"> <span class="text-white">Booking</span> </button>
                                </a>
                            </div>
                        </div>
                </div>

            </div>
            </div>
        </div>
        
        @endsection