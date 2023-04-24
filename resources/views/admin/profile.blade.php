@extends('layouts.tlayout')

        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4" href="/teacher/dashboard"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="/teacher/profile"><i
                        class="fas fa-user"></i><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/teacher/attendance"><i
                        class="fas fa-table"></i><span>Attendance</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/teacher/nilam"><i
                        class="fas fa-book"></i><span>Nilam</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/teacher/booking">
                <i class="fa fa-bookmark" aria-hidden="true"></i><span>Booking</span></a></li>            {{-- <li class="nav-item has-submenu">
                <a class="nav-link" href="#"> Submenu links  </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link" href="#">Submenu item 1 </a></li>
                    <li><a class="nav-link" href="#">Submenu item 2 </a></li>
                    <li><a class="nav-link" href="#">Submenu item 3 </a> </li>
                </ul>
            </li> --}}
        </ul>
        @endsection

        @section('content')
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="assets/img/profile.jpg" width="160" height="160">
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change
                                            Photo</button></div>
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
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="username"><strong>Username</strong></label><input
                                                                class="form-control" type="text" id="username"
                                                                placeholder="user.name" name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="email"><strong>Email
                                                                    Address</strong></label><input class="form-control"
                                                                type="email" id="email"
                                                                placeholder="user@example.com" name="email"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="first_name"><strong>First
                                                                    Name</strong></label><input class="form-control"
                                                                type="text" id="first_name" placeholder="John"
                                                                name="first_name"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="last_name"><strong>Last
                                                                    Name</strong></label><input class="form-control"
                                                                type="text" id="last_name" placeholder="Doe"
                                                                name="last_name"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="phone_number"><strong>Phone number</strong></label><input class="form-control"
                                                                type="text" id="phone_number" placeholder="Phone No"
                                                                name="phone_number"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="year"><strong>Year</strong></label><input class="form-control"
                                                                type="text" id="year" placeholder="3"
                                                                name="year"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="Address"><strong>Address</strong></label><input class="form-control"
                                                                type="text" id="Address" placeholder="Address"
                                                                name="Address"></div>
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