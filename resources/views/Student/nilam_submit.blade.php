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
        @include('sweetalert::alert')

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <a href="{{route('nilam.index')}}" style="margin: auto; ">
                            <img src="{{ asset('Image/nilam.png') }}" style="width: 50px;" alt="Nilam logo">
                        </a>
                    </div>
                    <div>
                        <a href="{{route('nilam.index')}}" style="text-decoration: none"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i> &nbsp; Go Back</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Nilam Submission</p>
                        </div>
                        <div class="card-body p-5">
                            <h2 class="text-primary fw-bold text-center mt-3">Submission</h2>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <form action="{{route('nilam.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="p-3 col"><label class="form-label" for="book_title"><strong>Book
                                                    Title *</strong></label><input class="form-control" type="text"
                                                id="book_title" placeholder="Title" name="book_title" required></div>
                                        <div class="p-3 col"><label class="form-label"
                                                for="Type"><strong>Type</strong></label>
                                            <select class="form-select" name="type" aria-label="Default select example" required>
                                                <option selected disabled>Fiction/Non-fiction</option>
                                                <option value="Fiction">Fiction</option>
                                                <option value="Non-fiction">Non-fiction</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input class="form-control" type="hidden" id="status"
                                    name="status" value="Pending">

                                    <div class="row">
                                        <div class="p-3 col">
                                            <label class="form-label" for="date"><strong>Date of reading
                                                    *</strong></label>
                                            <input class="form-control" type="date" id="date"
                                                placeholder="Title" name="date" required>
                                        </div>
                                        <div class="p-3 col">
                                            <label class="form-label" for="language"><strong>Language
                                                    *</strong></label>
                                            <input class="form-control" type="text" id="language"
                                                placeholder="English" name="language" required>
                                        </div>
                                        <script>
                                            date.max = new Date().toISOString().split("T")[0];
                                        </script>
                                    </div>

                                    <div class="row">
                                        <div class="p-3 col">
                                            <label class="form-label" for="Publisher"><strong>Publisher
                                                    *</strong></label>
                                            <input class="form-control" type="text" id="Publisher"
                                                placeholder="Publisher" name="Publisher" required>
                                        </div>
                                        <div class="p-3 col">
                                            <label class="form-label" for="Author"><strong>Author
                                                    *</strong></label>
                                            <input class="form-control" type="text" id="Author"
                                                placeholder="ali" name="Author" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="p-3 col">
                                            <label class="form-label" for="YearOP"><strong>Year of Publication
                                                    *</strong></label>
                                            <input class="form-control" id="YearOP" placeholder="Title"
                                                name="YearOP" required type="number" min="1300" max="2099"
                                                step="1" value="2016" />
                                        </div>
                                        <div class="p-3 col">
                                            <label class="form-label" for="NoOP"><strong>No. of Pages
                                                    *</strong></label>
                                            <input class="form-control" id="NoOP"
                                                name="NoOP" value="100" required type="number" min="0" step="1"
                                                value="0" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Summary"><strong>Summary *</strong></label>
                                        <textarea class="form-control" name="Summary" id="Summary" rows="3" placeholder="Summary" required></textarea>
                                    </div>
                                    <div class="d-flex flex-row bd-highlight justify-content-center">
                                        <div class="mt-2 mb-2 w-25">
                                            <button type="submit" class="btn bg-warning w-100">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection