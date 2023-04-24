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
                {{-- @if (Session::has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session::get('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif --}}
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
                        @include('sweetalert::alert')

                        <div class="card-body">
                            <h2 class="text-primary fw-bold text-center mt-3">Nilam</h2>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Submission Date</th>
                                            <th>Language</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($nilam as $nilams)
                                        <tr>
                                            <td>{{$nilams->title}}</td>
                                            <td>{{$nilams->type}}</td>
                                            <td>{{$nilams->created_at}}</td>
                                            <td>{{$nilams->language}}</td>
                                            <td>{{$nilams->author}}</td>
                                            <th>{{$nilams->status}}</th>
                                            @if ($nilams->status=="Approved" || $nilams->status == "")
                                                <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            @else
                                                <td>&nbsp;&nbsp;<a href="{{route('nilam.edit',$nilams->id)}}"><button type="submit" class="border-0 bg-white"
                                                    name="edit"><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></a></td>
                                            @endif

                                            <td>&nbsp;&nbsp;
                                                <a href="{{route('nilam.show',$nilams->id)}}"><button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td></a>
                                            <td>                                            
                                                <form action="{{route('nilam.destroy', $nilams->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    &nbsp;&nbsp;<button type="submit" id="test" class="border-0 bg-white" data-id="{{$nilams->id}}" name="delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>                     
                                                </form>
                                            </td>

                                            {{-- <script>
                                                
                                                document.getElementById("test").addEventListener('click',function (event)
                                                {
                                                    var form =  $(this).closest("form");
                                                    var name = $(this).data("name");
                                                    event.preventDefault();
                                                    swal({
                                                        title: "Do you want to delete the booking?",
                                                        text: "Once deleted, you will not be able to recover this booking",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                            form.submit();
                                                        }
                                                    });
                                                }); 
                                                swal("Good job!", "You clicked the button!", "success");
                                            </script> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex flex-row bd-highlight justify-content-center">
                                <div class="mt-2 mb-2 w-25">
                                    <a href="{{route('nilam.create')}}">
                                        <button class="btn bg-warning w-100">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection