@extends('layouts.layout')
@section('sidebar')
<ul class="navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item"><a class="nav-link mt-4" href="{{route('student.dashboard')}}"><i
                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('student.profile')}}"><i
                class="fas fa-user"></i><span>Profile</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('student.attendance')}}"><i
                class="fas fa-table"></i><span>Attendance</span></a></li>
    <li class="nav-item"><a class="nav-link active" href="{{route('nilam.index')}}"><i
                class="fas fa-book"></i><span>Nilam</span></a></li>
</ul>
@endsection
        @section('content')
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <a href="{{route('nilam.index')}}" style="margin: auto; ">
                            <img src="{{ asset('Image/nilam.png') }}" style="width: 50px;" alt="Nilam logo">
                        </a>
                    </div>
                    <div>
                        <a href="{{route('nilam.index')}}" style="text-decoration: none"><i class="fa fa-arrow-left"
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
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Book Title</th>
                                            <td>{{$nilam->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>{{$nilam->type}}</td>
                                        </tr>
                                        <tr>
                                            <th>Date of Reading</th>
                                            <td>{{$nilam->date}}</td>
                                        </tr>
                                        <tr>
                                            <th>Language</th>
                                            <td>{{$nilam->language}}</td>
                                        </tr>
                                        <tr>
                                            <th>Publisher</th>
                                            <td>{{$nilam->publisher}}</td>
                                        </tr>
                                        <tr>
                                            <td>Author</td>
                                            <td>{{$nilam->author}}</td>
                                        </tr>
                                        <tr>
                                            <th>Year of Publication</th>
                                            <td>{{$nilam->yearofpublication}}</td>
                                        </tr>
                                        <tr>
                                            <th>No of Pages</th>
                                            <td>{{$nilam->NoofPages}}</td>
                                        </tr>
                                        <tr>
                                            <th>Summary</th>
                                            <td>{{$nilam->summary}}</td>
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