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
                    <form action="{{route('teacher.booking.update', $booking->id)}}" method="POST"">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <input class="form-control" type="hidden" id="status" name="status" value="Pending">

                        <div class="p-3 col"><label class="form-label"
                            for="Type"><strong>Room Type</strong></label>
                        <select class="form-select" name="room" aria-label="Default select example" required>
                            <option disabled >Please select one room</option>
                            @if($booking->room == 'A')
                                <option value="A" selected>Room A</option>
                                <option value="B">Room B</option>
                                <option value="C">Room C</option>
                            @elseif($booking->room == 'B')
                                <option value="A">Room A</option>
                                <option value="B" selected>Room B</option>
                                <option value="C">Room C</option>
                            @else
                                <option value="A">Room A</option>
                                <option value="B">Room B</option>
                                <option value="C" selected>Room C</option>
                            @endif
                        </select>
                    </div>

                    <input class="form-control" type="hidden" id="book_title" value="Pending" name="status">

                    <div class="row">
                        <div class="p-3 col"><label class="form-label" for="StartTime"><strong>Booking
                        Date</strong></label>
                        <input class="form-control" type="date" value="{{$booking->bookingdate}}"
                        id="book_title" placeholder="Date" name="date" min="{{$now}}" required></div>
                    </div>     

                    <div class="row">
                        <div class="p-3 col"><label class="form-label" for="StartTime"><strong>Starting
                        Time</strong></label>
                        <input class="form-control" type="time" value="{{$booking->TimeIn}}" min="09:00"
                        id="book_title" placeholder="Starting Time" name="start_time" required></div>
                    </div>                                    
                    <div class="row">
                        <div class="p-3 col"><label class="form-label" for="EndTime"><strong>Ending
                        Time</strong></label>                                        
                        <input class="form-control" type="time"
                        id="book_title" placeholder="Ending Time" name="End_time" value="{{$booking->TimeOut}}" required></div>
                    </div>   
                    <div class="d-flex flex-row bd-highlight justify-content-center">
                        <div class="mt-2 mb-2 w-25">
                            <button type="submit" class="btn bg-warning w-100">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            </div>
        </div>
        
        @endsection