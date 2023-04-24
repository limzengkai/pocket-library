@extends('layouts.layout')

@section('sidebar')
<ul class="navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item"><a class="nav-link mt-4" href="{{route('student.dashboard')}}"><i
                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li class="nav-item"><a class="nav-link active" href="{{route('student.profile')}}"><i
                class="fas fa-user"></i><span>Profile</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('student.attendance')}}"><i
                class="fas fa-table"></i><span>Attendance</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('nilam.index')}}"><i
                class="fas fa-book"></i><span>Nilam</span></a></li>
</ul>
@endsection

        @section('content')
                <div class="container-fluid">
                    @if (Session::has('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session::get('error')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session::get('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <form action="{{ route('student.image.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="{{asset('/storage/images/students/' . $data->image)}}" width="160" height="160">
                                        {{-- <label class="form-label" for="customFile">Default file input example</label> --}}
                                        <input type="file" class="form-control" id="customFile" name="image" />
                                    <div class="mb-3 mt-4">
                                        <button class="btn btn-primary btn-sm" type="submit">Change
                                            Photo</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Details</p>
                                        </div>
                                        {{-- {{dd($data->name)}} --}}
                                        <div class="card-body">
                                            <form action="{{ route('student.profile.update')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="username"><strong>Username</strong></label><input
                                                                class="form-control" value="{{$data->name}}" type="text" id="username"
                                                                placeholder="user.name" name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="email"><strong>Email
                                                                    Address</strong></label><input class="form-control"
                                                                type="email" value="{{$data->email}}"" id="email"
                                                                placeholder="user@example.com" name="email" @disabled(true)></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="first_name"><strong>First
                                                                    Name</strong></label><input class="form-control"
                                                                type="text" id="first_name" placeholder="John"
                                                                name="first_name" value="{{$data->FirstName}}""></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="last_name"><strong>Last
                                                                    Name</strong></label><input class="form-control"
                                                                type="text" id="last_name" placeholder="Doe"
                                                                 name="last_name" value="{{$data->LastName}}"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="phone_number"><strong>Phone number</strong></label><input class="form-control"
                                                                type="text" id="phone_number" placeholder="Phone No"
                                                                name="phone_number" value="{{$data->Phone_number}}"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="year"><strong>Year</strong></label><input class="form-control"
                                                                type="text" id="year" placeholder="3"
                                                                name="year" value="{{$data->Year}}"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="Address"><strong>Address</strong></label><input class="form-control"
                                                                type="text" id="Address" placeholder="Address"
                                                                name="Address" value="{{$data->Address}}"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm"
                                                        type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection