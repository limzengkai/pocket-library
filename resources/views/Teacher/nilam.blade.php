@extends('layouts.tlayout')
        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4" href="{{route('teacher.dashboard')}}"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('teacher.profile')}}"><i
                        class="fas fa-user"></i><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('teacher.attendance')}}"><i
                        class="fas fa-table"></i><span>Attendance</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{route('tnilam.index')}}"><i
                        class="fas fa-book"></i><span>Nilam</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('teacher.booking')}}">
                <i class="fa fa-bookmark" aria-hidden="true"></i><span>Booking</span></a></li>
        </ul>
        @endsection
        
        @section('content')
                @include('sweetalert::alert')

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <a href="" style="margin: auto; ">
                            <img src="{{ asset('Image/nilam.png') }}" style="width: 50px;" alt="Nilam logo">
                        </a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Nilam Record</p>
                        </div>
                        <div class="card-body">
                            <h2 class="text-primary fw-bold text-center mt-3">Nilam</h2>
                            <form type="get" action="nilam/search" class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input class="bg-light form-control border-0 small" name="query" type="search"
                                        placeholder="Search Title">
                                    <button class="btn btn-primary py-0" type="submit">
                                    <i class="fas fa-search"></i></button></div>
                            </form>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Submission Date</th>
                                            <th>Language</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($nilam as $nilams)
                                        <tr>
                                            <td>{{$names[$nilams->StudentID]}}
                                            <td>{{$nilams->title}}</td>
                                            <td>{{$nilams->type}}</td>
                                            <td>{{$nilams->created_at}}</td>
                                            <td>{{$nilams->language}}</td>
                                            <td>{{$nilams->author}}</td>
                                            <th>{{$nilams->status}}</th>
                                            <td>&nbsp;&nbsp;
                                                <a href="{{route('tnilam.show',$nilams->id)}}"><button type="submit" 
                                                    class="border-0 bg-white" name="view"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection