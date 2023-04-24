@extends('layouts.layout')
@section('sidebar')
<ul class="navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item"><a class="nav-link mt-4" href="{{route('student.dashboard')}}"><i
                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('student.profile')}}"><i
                class="fas fa-user"></i><span>Profile</span></a></li>
    <li class="nav-item"><a class="nav-link active" href="{{route('student.attendance')}}"><i
                class="fas fa-table"></i><span>Attendance</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{route('nilam.index')}}"><i
                class="fas fa-book"></i><span>Nilam</span></a></li>
</ul>
@endsection

        @section('content')

                <div class="container-fluid">
                    <div>
                        <a href="{{route('student.attendance')}}" style="text-decoration: none"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i> &nbsp; Go Back</a>
                    </div>
                    {{-- <h3 class="text-dark mb-4">Attendance</h3> --}}
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold text-center">Qr code</p>
                        </div>
                            <div class="card-body">
                                <div class="visible-print text-center">
                                    
                                    {!! QrCode::size(400)->generate($id); !!}
                                    <p>Save me to use for your attendance.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection