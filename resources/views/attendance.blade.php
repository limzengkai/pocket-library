@extends('layouts.layout')
        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4" href="/sdash"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/profile"><i
                        class="fas fa-user"></i><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="/attendance"><i
                        class="fas fa-table"></i><span>Attendance</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/nilam"><i
                        class="fas fa-book"></i><span>Nilam</span></a></li>
            {{-- <li class="nav-item has-submenu">
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
                    <h3 class="text-dark mb-4">Attendance</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Attendance Record</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Student ID</th>
                                            <th>Date</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>ALI</td>
                                            <td>ABC123</td>
                                            <td>2008/11/28</td>
                                            <td>10:00 AM</td>
                                            <td>12:00 PM</td>
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