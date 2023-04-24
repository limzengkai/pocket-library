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
                            <p class="text-primary m-0 fw-bold">Student Nilam Record</p>
                        </div>
                        <div class="card-body">
                            <h2 class="text-primary fw-bold text-center mt-3">Nilam - LIM ZENG KAI</h2>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Submission Date</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>The House of Mirth</td>
                                            <td>&nbsp;24/12/2022</td>
                                            <td>&nbsp;Pending</td>
                                            <td>&nbsp;&nbsp;<a href="/nilam/edit"><button type="submit" class="border-0 bg-white"
                                                name="edit"><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></a></td>
                                            <td>&nbsp;&nbsp;
                                                <a href="/nilam/view"><button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td></a>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>The Sun also Rises</td>
                                            <td>&nbsp;22/12/2022</td>
                                            <td>&nbsp;Approved</td>
                                            <td>&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="edit" disabled><i class="fas fa-edit"
                                                    aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;<button type="submit" class="border-0 bg-white"
                                                    name="view"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                    class="border-0 bg-white" name="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status"
                                        aria-live="polite">Showing 1 to 10 of 23</p>
                                </div>
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous"
                                                    href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next"
                                                    href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="d-flex flex-row bd-highlight justify-content-center">
                                <div class="mt-2 mb-2 w-25">
                                    <a href="/nilam/submit">
                                        <button class="btn bg-warning w-100">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection