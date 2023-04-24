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
              <a class="nav-link active" href="#submenu2" data-toggle="collapse" data-target="#submenu2">
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
          <li class="nav-item"><a class="nav-link" href="{{route('booking.index')}}"><i class="fa fa-bookmark" aria-hidden="true"></i><span>Booking</span></a></li>
      </ul>
        @endsection
        @section('content')
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <h1 style="text-align: center" class="mt-3">ADMIN REGISTRATION</h1>
            <div class="col">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                @if (Session::has('error'))
                <div class="alert alert-warning alert-dismissible show" role="alert">
                  <strong>{{session::get('error')}}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
                <div class="card">
                  <div class="card-body py-5 px-md-5">
                    <form action="{{route('admin.register.create')}}" method="post">
                      {{-- @if (Session::has('error'))
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>{{session::get('error')}}</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  @endif --}}
                      @csrf
                      <!-- Name input -->                  
                      <div class="form-outline mb-4">
                        <label class="form-label" for="name">Username</label>
                        <input type="name" name="name" class="form-control" />
                      </div>
      
                      <!-- Email input -->
                      <div class="form-outline mb-4">
                        <label class="form-label" for="formU2">Email address</label>
                        <input type="email" name="email" class="form-control" />
                      </div>

                      <!-- Password input -->
                      <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="formU3">Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="formU3">Comfirm Password</label>
                            <input type="password" name="password_comfirmation" class="form-control" />
                        </div>
                        </div>
                      </div>

                      <!-- Submit button -->
                      <button type="submit" class="btn btn-primary btn-block mb-4">
                        Sign up
                      </button>
    
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      @endsection