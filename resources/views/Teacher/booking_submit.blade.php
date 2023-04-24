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
                        <h1 class="text-primary m-0 fw-bold">Room Booking</h1>
                    </div>
                    <div>
                        <a href="/teacher/booking" style="text-decoration: none"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i> &nbsp; Go Back</a>
                    </div>
                    <div class="card shadow ">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Room Booking Form</p>
                        </div>
                        <div class="card-body p-5 ">
                            

                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <form action="{{route('teacher.booking.store')}}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <div class="row">
                                        <div class="p-3 col"><label class="form-label"
                                                for="Type"><strong>Room Type</strong></label>
                                            <select class="form-select" name="room" aria-label="Default select example" required>
                                                <option selected disabled >Please select one room</option>
                                                <option value="A">Room A</option>
                                                <option value="B">Room B</option>
                                                <option value="C">Room C</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input class="form-control" type="hidden" id="book_title" value="{{Auth::guard('teacher')->user()->name}}" name="name">

                                    <input class="form-control" type="hidden" id="book_title" value="Pending" name="status">

                                    <div class="row">
                                        <div class="p-3 col"><label class="form-label" for="StartTime"><strong>Booking
                                        Date</strong></label>
                                        <input class="form-control" type="date" value="{{$now}}"
                                        id="book_title" placeholder="Date" name="date" min="{{$now}}" required></div>
                                    </div>     

                                    <div class="row">
                                        <div class="p-3 col"><label class="form-label" for="StartTime"><strong>Starting
                                        Time</strong></label>
                                        <input class="form-control" type="time" value="09:00" min="09:00"
                                        id="book_title" placeholder="Starting Time" name="start_time" required></div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="p-3 col"><label class="form-label" for="EndTime"><strong>Ending
                                        Time</strong></label>                                        
                                        <input class="form-control" type="time"
                                        id="book_title" placeholder="Starting Time" name="End_time" value="10:00" required></div>
                                    </div>   
                                    <div class="d-flex flex-row bd-highlight justify-content-center">
                                        <div class="mt-2 mb-2 w-25">
                                            <button type="submit" class="btn bg-warning w-100 show_confirm" id="test">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('script')
    <script>
        // document.getElementById("test").addEventListener('click',function (event)
        // {
        //     var form =  $(this).closest("form");
        //     var name = $(this).data("name");
        //     event.preventDefault();
        //     swal({
        //         title: `Are you sure you want to delete this record?`,
        //         text: "If you delete this, it will be gone forever.",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //     })
        //     .then((willDelete) => {
        //         if (willDelete) {
        //             form.submit();
        //         }
        //     });
        // });
    </script>

@endsection