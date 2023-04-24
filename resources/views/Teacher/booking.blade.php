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
            {{-- @if (Session::has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session::get('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('Failed'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session::get('Failed')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-primary m-0 fw-bold">Library Room Booking System</h1>
            </div>
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Booking List</p>
                </div>
                
                <div class="card-body p-5">
                    <a href="{{route('teacher.booking.show')}}">
                        <button type="button" class="btn btn-warning mb-3 p-2">
                            <b>
                                View All Record
                            </b>
                        </button>
                    </a>
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th>Date</th>
                                    <th>TimeIn</th>
                                    <th>TimeOut</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach ($date as $dates)
                                    <tr>                                        
                                        <td>{{$dates->name}}</td>
                                        <td>{{$dates->room}}</td>
                                        <td>{{$dates->bookingdate}}</td>
                                        <td>{{$dates->TimeIn}}</td>
                                        <td>{{$dates->TimeOut}}</td>
                                        <td>{{$dates->status}}</td>
                                        @if ($dates->status=="Approved")
                                        <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                            name="edit" disabled><i class="fas fa-edit"
                                            aria-hidden="true"></i></button></td>
                                        @else
                                            <td>&nbsp;&nbsp;<a href="{{route('teacher.booking.edit',$dates->id)}}"><button type="submit" class="border-0 bg-white"
                                                name="edit"><i class="fas fa-edit"
                                                aria-hidden="true"></i></button></a></td>
                                        @endif
                                        <td>   
                                            <form action="{{route('teacher.booking.delete', $dates->id)}}" method="post">
                                                <input type="hidden" name="" id="dat_delete" value="{{$dates->id}}">
                                                @method('DELETE')
                                                @csrf
                                                &nbsp;&nbsp;<button type="submit" id="test" class="border-0 bg-white delete" data-id="{{$dates->id}}" name="delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>  
                                                </button>                     
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        {{-- {{$date->links()}} --}}
                        <div class="d-flex flex-row bd-highlight justify-content-center">
                            <div class="mt-5 mb-3 w-25">
                                <a href="{{route('teacher.booking.create')}}"">
                                    <button type="button" class="btn bg-danger w-100"> <span class="text-white">Booking</span> </button>
                                </a>
                            </div>
                        </div>
                </div>

            </div>
            </div>
        </div>
        
        @endsection
        @section('script')

        @endsection