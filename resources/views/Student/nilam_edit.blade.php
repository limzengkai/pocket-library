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
                <div class="container-fluid">
                @include('sweetalert::alert')

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
                            <p class="text-primary m-0 fw-bold">Nilam Edit</p>
                        </div>
                        <div class="card-body p-5">
                            <h2 class="text-primary fw-bold text-center mt-3">Edit</h2>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <form action="{{route('nilam.update', $nilam->id)}}" method="POST" onsubmit="return submitForm(this);">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="p-3 col"><label class="form-label" for="book_title"><strong>Book
                                                    Title *</strong></label><input class="form-control" type="text"
                                                id="book_title" placeholder="Title" value="{{$nilam->title}}" name="book_title" required></div>
                                        <div class="p-3 col"><label class="form-label"
                                                for="Type"><strong>Type</strong></label>
                                            <select class="form-select" name="type" aria-label="Default select example" value="{{$nilam->type}}" required>
                                                @if ($nilam->type == "Fiction")
                                                    <option disabled>Fiction/Non-fiction</option>
                                                    <option value="Fiction" selected>Fiction</option>
                                                    <option value="Non-fiction">Non-fiction</option>                                 
                                                @else
                                                    <option disabled>Fiction/Non-fiction</option>
                                                    <option value="Fiction">Fiction</option>
                                                    <option value="Non-fiction" selected>Non-fiction</option>
                                                @endif

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
                                                placeholder="Title" value="{{$nilam->date}}" name="date" required>
                                        </div>
                                        <div class="p-3 col">
                                            <label class="form-label" for="language"><strong>Language
                                                    *</strong></label>
                                            <input class="form-control" type="text" id="language" value="{{$nilam->language}}"
                                                placeholder="English" name="language" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="p-3 col">
                                            <label class="form-label" for="Publisher"><strong>Publisher
                                                    *</strong></label>
                                            <input class="form-control" type="text" id="Publisher" value="{{$nilam->publisher}}"
                                                placeholder="Title" name="Publisher" required>
                                        </div>
                                        <div class="p-3 col">
                                            <label class="form-label" for="Author"><strong>Author
                                                    *</strong></label>
                                            <input class="form-control" type="text" id="Author" value="{{$nilam->author}}"
                                                placeholder="English" name="Author" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="p-3 col">
                                            <label class="form-label" for="YearOP"><strong>Year of Publication
                                                    *</strong></label>
                                            <input class="form-control" id="YearOP" placeholder="Title"
                                                name="YearOP" required type="number" min="1600" max="2099"
                                                step="1" value="{{$nilam->yearofpublication}}" />
                                        </div>
                                        <div class="p-3 col">
                                            <label class="form-label" for="NoOP"><strong>No. of Pages
                                                    *</strong></label>
                                            <input class="form-control" id="NoOP"
                                                name="NoOP" value="100" value="{{$nilam->NofPages}}" required type="number" min="0" step="1"
                                                value="0" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Summary"><strong>Summary *</strong></label>
                                        <textarea class="form-control" id="Summary" name="Summary" rows="3" placeholder="Summary" required>{{$nilam->summary}}</textarea>
                                    </div>
                                    <div class="d-flex flex-row bd-highlight justify-content-center">
                                        <div class="mt-2 mb-2 w-25">
                                            <button type="submit" class="btn bg-warning w-100 confirm">Update</button>
                                        </div>
                                    </div>
                                </form>

                             {{-- @include('sweetalert::alert') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

{{-- <script>
    document.querySelector('#from1').addEventListener('submit', function(e) {
    var form = this;

    e.preventDefault(); // <--- prevent form from submitting

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
        }).then(function(isConfirm) {
        if (isConfirm) {
            swal({
            title: 'Shortlisted!',
            text: 'Candidates are successfully shortlisted!',
            icon: 'success'
            }).then(function() {
            form.submit(); // <--- submit form programmatically
            });
        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
        })
    });
</script> --}}
@section('script')
    {{-- <script type="text/javascript">

    
        the confirm class that is being used in the delete button
        $('.confirm').click(function(event) {

            //This will choose the closest form to the button
            var form =  $(this).closest("form");

            //don't let the form submit yet
            event.preventDefault();

            //configure sweetalert alert as you wish
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لا يمكنك التراجع عن حذف الفلم",
                cancelButtonText: "إلغاء",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'حذف'
            }).then((result) => {
                
                //in case of deletion confirm then make the form submit
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
        // function submitForm(form) {
        //     swal({
        //         title: "ABC",
        //         text: "ads",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //     })
        //     .then((isOkay) =>>{
        //         if (isOkay){
        //             form.submit();
        //         }
        //     });
        //     return false;
        // }
    </script> --}}
@endsection