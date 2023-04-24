@extends('admin.admin_layout')
        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4" href="{{route('admin.dashboard')}}"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item">
                <a class="nav-link active" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
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
                <a class="nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">
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
                <div class="container-fluid">
                    {{-- @if (Session::has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session::get('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif --}}
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"></p>
                        </div>
                        <div class="card-body p-5">
                            <h2 class="text-primary fw-bold text-center">Teacher Account Management</h2>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                            
                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($teacher as $teachers)
                                        <tr>
                                            <td>{{ $teachers->id }}</td>
                                            <td>{{ $teachers->name }}</td>
                                            <td>{{ $teachers->email }}</td>
                                            <td>{{ $teachers->password }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{route('teacher.edit',$teachers->id)}}">
                                                    <i class="fas fa-edit" aria-hidden="true"></i></button>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{route('teacher.show',$teachers->id)}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('teacher.destroy', $teachers->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-info" name="delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>                     
                                                </form>

                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                    </tbody>

                                </table>
                                {{$teacher->links()}}
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection