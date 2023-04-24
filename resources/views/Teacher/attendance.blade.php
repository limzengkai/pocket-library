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
                    <h3 class="text-dark mb-4">Attendance</h3>
                    <div>
                        <a href="{{route('teacher.attendance')}}" style="text-decoration: none"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i> &nbsp; Go Back</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Attendance Record</p>
                        </div>
                        @if (session()->has('Failed'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> {{  session()->get("Failed") }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                
                        @if (session()->has('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> {{  session()->get("success") }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="container row py-5 m-auto">
                                <div class="card bg-white col shadow rounded-3 p-3 border-0">
                                    <video id="preview"></video>
                        
                                    {{-- Form : Auto submit after scanning --}}
                                    <form action="{{route('attendance.store')}}" method="post" id="form">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                    </form>
                                </div>
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
                                </div>
                            </div>


                            <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                            <script type="text/javascript">
                                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                                scanner.addListener('scan', function (content) {
                                  console.log(content);
                                });
                                Instascan.Camera.getCameras().then(function (cameras) {
                                  if (cameras.length > 0) {
                                    scanner.start(cameras[0]);
                                  } else {
                                    console.error('No cameras found.');
                                  }
                                }).catch(function (e) {
                                  console.error(e);
                                });
                        
                                scanner.addListener('scan', function(c){
                                    document.getElementById('id').value = c;
                                    document.getElementById('form').submit();
                                })
                            </script>
                            <div class="d-flex flex-row bd-highlight justify-content-center">
                                <div class="mt-2 mb-2 w-25">
                                    <a href="#">
                                        <button class="btn bg-danger w-100"> <span class="text-white">Get Attendance</span> </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection