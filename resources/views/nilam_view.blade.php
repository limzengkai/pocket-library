@extends('layouts.layout')
        @section('sidebar')
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link mt-4" href="/sdash"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/profile"><i
                        class="fas fa-user"></i><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/attendance"><i
                        class="fas fa-table"></i><span>Attendance</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="/nilam"><i
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <a href="" style="margin: auto; ">
                            <img src="{{ asset('Image/nilam.png') }}" style="width: 50px;" alt="Nilam logo">
                        </a>
                    </div>
                    <div>
                        <a href="/nilam" style="text-decoration: none"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i> &nbsp; Go Back</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Nilam Viewing</p>
                        </div>
                        <div class="card-body p-5">
                            <h2 class="text-primary fw-bold text-center mt-3">Nilam</h2>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                            
                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Book Title</th>
                                            <td>The House of Mirth</td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>Fiction</td>
                                        </tr>
                                        <tr>
                                            <th>Date of Reading</th>
                                            <td>23/12/2022</td>
                                        </tr>
                                        <tr>
                                            <th>Language</th>
                                            <td>English</td>
                                        </tr>
                                        <tr>
                                            <th>Publisher</th>
                                            <td>Simon & Schuster.</td>
                                        </tr>
                                        <tr>
                                            <td>Author</td>
                                            <td>Edith Wharton</td>
                                        </tr>
                                        <tr>
                                            <th>Year of Publication</th>
                                            <td>1905</td>
                                        </tr>
                                        <tr>
                                            <th>No of Pages</th>
                                            <td>368</td>
                                        </tr>
                                        <tr>
                                            <th>ALI</th>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur et officiis repudiandae totam obcaecati ipsum. Similique repellat tempora unde consequuntur, sed illum? Iusto quo recusandae id excepturi eligendi minima incidunt.</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection