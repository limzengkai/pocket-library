@extends('layouts.tlayout')
        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4" href="{{route('teacher.dashboard')}}"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('teacher.profile')}}"><i
                        class="fas fa-user"></i><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{route('teacher.attendance')}}"><i
                        class="fas fa-table"></i><span>Attendance</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('tnilam.index')}}"><i
                        class="fas fa-book"></i><span>Nilam</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('teacher.booking')}}">
                <i class="fa fa-bookmark" aria-hidden="true"></i><span>Booking</span></a></li>
        </ul>
        @endsection

        @section('content')

                <div class="container-fluid">

                    <h3 class="text-primary mb-4">
                       <b>Attendance</b> 
                    </h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Attendance Record</p>
                        </div>

                        <div class="card-body">
                            <div class="container row py-5 m-auto">
                                <form method="POST" action="{{route('teacher.attendance.search')}}" class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
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


                            <div class="d-flex flex-row bd-highlight justify-content-center">
                                <div class="mt-2 mb-2 w-25">
                                    <a href="{{route('attendance.show')}}">
                                        <button class="btn bg-danger w-100"> <span class="text-white">Get Attendance</span> </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection