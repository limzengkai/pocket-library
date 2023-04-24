<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
            .divider:after,
            .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
            }
            /* .h-custom {
            height: calc(100% - 73px);
            } */
            @media (max-width: 450px) {
            .h-custom {
            height: 100%;
            }
            }
        </style>
    <title>School Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/main.css')}}"> 
</head>
<body>
    <section class="vh-100 p-2">
        <div class="container-fluid h-custom">
            <div class="logo mx-auto">
                <a href="/"><img class="mx-auto d-block img-fluid "  height="10px" src="{{asset('Image/logo.png')}}" alt="logo"></a>
            </div>
          <div class="row d-flex justify-content-center align-items-center h-100">
            <h1 style="text-align: center" class="mt-3">STUDENT REGISTRATION</h1>
            <div class="col">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">

              @if (Session::has('error'))
                <div class="alert alert-warning alert-dismissible show" role="alert">
                  <strong>{{session::get('error')}}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
                <div class="card">
                  <div class="card-body py-5 px-md-5">
                  
                    <form action="{{route('student.register.create')}}" method="POST">
                      @csrf
                      <!-- Name input -->                  
                      <div class="form-outline mb-4">
                        <label class="form-label" for="name">Username *</label>
                        <input type="name" name="name" class="form-control" required>
                      </div>

                      <!-- Email input -->
                      <div class="form-outline mb-4">
                        <label class="form-label" for="formU2">Email address *</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>

                      <!-- Password input -->
                      <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="formU3">Password*</label>
                                <input type="password" name="password" class="form-control" minlength="8" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="formU3">Comfirm Password*</label>
                            <input type="password" name="password_comfirmation" class="form-control" minlength="8" required>
                        </div>
                        </div>
                      </div>

                      <!-- Submit button -->
                      <button type="submit" class="btn btn-primary btn-block mb-4">
                        Sign up
                      </button>
    
                      <a href="{{route('student_login_form')}}">Login page</a>
                    </form>

                    {{-- <script>
                      document.querySelector('form').addEventListener('click', function(event) {
                        var password = document.querySelector('#password').value;
                        var confirmPassword = document.querySelector('#password_comfirmation').value;
                        if (password !== confirmPassword) {
                          alert('Password and Confirm Password do not match');
                          event.preventDefault();
                        }
                      });
                    </script> --}}

                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
          <!-- Copyright -->
          <div class="text-white text-center">
            <p>&copy; All rights reserved under us</p>
          </div>
        </div>
      </section>

    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>