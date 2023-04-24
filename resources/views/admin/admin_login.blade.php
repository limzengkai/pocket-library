<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pocket System</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	  <link rel="stylesheet" href="{{url('css/main.css')}}"> 
</head>
<body>
    <section class="vh-100 p-2">
        <div class="container-fluid h-custom">
            <div class="logo mx-auto">
                <a href="/"><img class="mx-auto d-block img-fluid "  height="10px" src="{{asset('Image/logo.png')}}" alt="logo"></a>
            </div>
          <div class="row d-flex justify-content-center align-items-center h-100">
            <h1 style="text-align: center" class="mt-3">ADMIN LOGIN</h1>
            <div class="col">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>

            <div class="col offset-xl-1">
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg required"
                    placeholder="Enter a valid email address" />
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg required"
                    placeholder="Enter password" />
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input type="checkbox" class="form-check-input me-2" onclick="myFunction()">
                    <label class="form-check-label" for="form2Example3">
                      Show Password
                    </label>
                  </div>
                </div>
                
                <script>
                  function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                  </script>

                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="mt-1 d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
          <!-- Copyright -->
          <div class="text-white mb-3 mb-md-0 mt-2">
            &copy; All rights reserved under us
          </div>
        </div>
      </section>


    {{-- JavaScript --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>